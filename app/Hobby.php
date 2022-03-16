<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'hobby_category_id' => 'required',
    );
    
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
}
