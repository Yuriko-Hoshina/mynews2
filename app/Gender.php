<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender_id' => 'required',
    );
    
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
}
