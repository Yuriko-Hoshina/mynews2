<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProHistory;
use App\Gender;
use App\Hobby;
use App\HobbyCategory;
use App\User;
use Carbon\Carbon;
use Auth;
use Storage;

class ProfileController extends Controller
{
    //
    public function add(){
        /*  プルダウン(普通)verの場合
        $genders = Gender::all();
        $hobbies = Hobby::all();
        return view('admin.profile.create', compact(['genders','hobbies'])); */
        
        //  プルダウン(連動)verの場合
        $hobbyCategories = HobbyCategory::all()->sortBy('id');
        $genders = Gender::all();
        $hobbies = Hobby::where('hobby_category_id', $profile->hobby->hobby_category_id)->orderBy('name', 'asc')->get();
        $jsAry = self::mkJsMatAry($hobbyCategories);
        
        return view('admin.profile.create', compact(['genders', 'hobbies', 'hobbyCategories', 'jsAry']));
    }
    
    public function create(Request $request)
    {
        //  validationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //  フォームから画像が送信されてきたら、保存して$profile->image_pathに画像のパスを保存する
        if(isset($form['image'])){
            //  デプロイ前のコード
            /* $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path); */
            //  デプロイ後のコード
            $path = Storage::disk('s3')->putFile('/profile2', $form['image'], 'public');
            $profile->image_path = Storage::disk('s3')->url($path);
            
        }else{
            $profile->image_path = null;
        }
        //  フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //  フォームから送信されてきたimageを削除する
        unset($form['image']);
        //  フォームから送信されてきたhobby_category_idを削除する
        unset($form['hobby_category_id']);
        
        //  データベースに保存する
        $profile->fill($form);
        $profile->user_id = Auth::id();
        $profile->save();
        
        //  プロフ一覧画面へと遷移する。画面遷移不要なら'admin/profile2/create'に設定
        return redirect('admin/profile2/');
    }

    public function index(Request $request)
    {
        $q = $request->q;
        
        if($q !=''){
        //  検索されたら検索結果を取得する。細かい設定はプロフィールモデルに設定している
            $posts = Profile::searchByKeyword($q);
        }else{
        //  それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }

        return view('admin.profile.index', compact(['posts', 'q']));
    }

    public function edit(Request $request)
    {
        // プルダウン(普通)verの場合
        /* $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        $genders = Gender::all();
        $hobbies = Hobby::all();
        return view('admin.profile.edit', compact(['profile', 'genders', 'hobbies'])); */
        
        //  プルダウン(連動)の場合
        $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        $genders = Gender::all();
        
        $hobbyCategories = HobbyCategory::all()->sortBy('id');
        $hobbies = Hobby::where('hobby_category_id', $profile->hobby->hobby_category_id)->orderBy('name', 'asc')->get();
        $jsAry = self::mkJsMatAry($hobbyCategories);
        
        
        return view('admin.profile.edit', compact(['profile', 'genders', 'hobbyCategories', 'hobbies', 'jsAry']));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        //  ProfileModelからデータを取得する
        $profile = Profile::find($request->id);
        //  送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        if($request->remove == 'true'){
            $profile_form['image_path'] = null;
        }elseif($request->file('image')){
            //  デプロイ前のコード
            /* $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path); */
            //  デプロイ後のコード
            $path = Storage::disk('s3')->putFile('/profile2', $profile_form['image'], 'public');
            $profile->image_path = Storage::disk('s3')->url($path);
            
        }else{
            $profile_form['image_path'] = $profile->image_path;
        }
        
        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        unset($profile_form['hobby_category_id']);
        
        $profile->fill($profile_form)->save();
        
        //  このProfile Modelを保存するタイミングで同時にProHistory Modelにも編集履歴を追加するようにする
        $history = new ProHistory();
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile2/');
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile2');
    }
}