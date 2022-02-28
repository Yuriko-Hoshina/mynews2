<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProHistory;
use App\Gender;
use Carbon\Carbon;
use Auth;

class ProfileController extends Controller
{
    //
    public function add(){
        $genders = Gender::all();
        return view('admin.profile.create', compact(['genders']));
    }
    
    public function create(Request $request)
    {
        //  validationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //  フォームから画像が送信されてきたら、保存して$profile->image_pathに画像のパスを保存する
        if(isset($form['image'])){
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        }else{
            $profile->image_path = null;
        }
        //  フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //  フォームから送信されてきたimageを削除する
        unset($form['image']);
        
        //  データベースに保存する
        $profile->fill($form);
        $profile->user_id = Auth::id();
        $profile->save();
        
        return redirect('admin/profile2/create');
    }
    
    public function index(Request $request)
    {
        $q = $request->q;
        if($q !=''){
        //  検索されたら検索結果を取得する    
            $posts = Profile::where('name', 'like', '%' . $q . '%')->
              orWhere('hobby', 'like', '%' . $q. '%')->
              orWhere('introduction', 'like', '%' . $q. '%')->
              orWhere('birthday', 'like', '%' . $q. '%')->
              orWhere('gender', 'like', '%' . $q. '%')->
              get();
        }else{
        //  それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', compact(['posts', 'q']));
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        $genders = Gender::all();
        return view('admin.profile.edit',compact(['profile', 'genders']));
    }
    
    public function update(Request $request)
    {
        $this->validate($request,Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        if($request->remove == 'true'){
            $profile_form['image_path'] = null;
        }elseif($request->file('image')){
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        }else{
            $profile_form['image_path'] = $profile->image_path;
        }
        
        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
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
