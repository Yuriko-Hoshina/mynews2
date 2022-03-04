<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //
    protected $guarded = array('id');
    
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
    
    // tagnのIdの配列から、and検索を行い、レシピのidの配列を返す
    /* public static function recipeIds($tagIds) {
        $ids = [];
        $i = 0;
        foreach($tagIds as $tagId => $value) {
          if (!$i) {
            $ids = self::where('tag_id', $tagId)->pluck('recipe_id')->toArray();
          } else {
            $ids = array_intersect($ids, self::where('tag_id', $tagId)->pluck('recipe_id')->toArray());
          }
          $i++;
        }
        return $ids;
    } */
}
