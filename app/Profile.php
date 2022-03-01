<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender_id' => 'required',
        'birthday' => 'date',
        'hobby_id' => 'required',
        'introduction' => 'required',
    );
    
    //  Profile Modelに関連付けを行う
    public function pro_histories()
    {
        return $this->hasMany('App\ProHistory')->limit(3);
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
}
