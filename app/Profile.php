<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'birthday' => 'date',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    //  Profile Modelに関連付けを行う
    public function pro_histories()
    {
        return $this->hasMany('App\ProHistory');
    }
    
}
