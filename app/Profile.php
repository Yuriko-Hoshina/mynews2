<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gender;
use App\Hobby;
use App\HobbyCategory;

class Profile extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender_id' => 'required',
        'birthday' => 'date',
        'hobby_category_id' => 'required',
        'hobby_id' => 'required',
        'introduction' => 'required',
    );
    
    //  Profile Modelに関連付けを行う
    public function pro_histories()
    {
        return $this->hasMany('App\ProHistory')->latest('edited_at')->limit(5);
    }
    
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
    
    public function hobby()
    {
        return $this->belongsTo('App\Hobby');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function searchByKeyword($q)
    {
        $query = self::query();
        //  性別、趣味に関して検索できるように指定
        $gender = Gender::where('name', 'like', '%' . $q. '%')->first();
        if ($gender) {
            $query = $query->where('gender_id', $gender->id);
        }
        
        $hobby = Hobby::where('name', 'like', '%' . $q. '%')->first();
        if ($hobby) {
            $query = $query->orWhere('hobby_id', $hobby->id);
        }
        
        //  趣味のカテゴリでの検索
        $category = HobbyCategory::where('name', 'like', '%' . $q. '%')->first();
        if ($category) {
            $query = $query->orWhereIn('hobby_id', $category->hobbyIds());
        }
        
        //  名前、誕生日、自己紹介に関して検索できるように指定
        $query = $query->orWhere('name', 'like', '%' . $q . '%')->
          // orWhere('gender', 'like', '%' . $q. '%')->
          orWhere('birthday', 'like', '%' . $q. '%')->
          // orWhere('hobby', 'like', '%' . $q. '%')->
          orWhere('introduction', 'like', '%' . $q. '%');
          
        return $query->get();
    }
    
}
