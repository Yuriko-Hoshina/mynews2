<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hobby;

class HobbyCategory extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );
    
    public function hobbies()
    {
        return $this->hasMany('App\Hobby');
    }
    
    public function hobbyIds()
    {
        return Hobby::where('hobby_category_id', $this->id)->pluck('id')->toArray();
    }
}
