<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    //
    protected $guarded = array('id');
    
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
}
