<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
//  NewsController等へ呼び出しされる
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Hobby;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
  * 趣味のJavaScript配列を作成する
  */
  protected static function mkJsMatAry($matCatCol) {
      $str = "[\n";
      foreach($matCatCol as $cat) {
        $str .= sprintf("{id:\"%d\", arr:\n", $cat->id);
        $str .= self::mkJsAry(Hobby::where('hobby_category_id', $cat->id)->orderBy('name', 'asc')->get(), ',');
        $str .= "},\n";
      }
      $str .= "];\n";

      return $str;
  }

  /**
  * JavaScript配列を作成する
  */
  protected static function mkJsAry($col, $lastchr) {
    $str = "  [\n";
    foreach($col as $item) {
      $str .= sprintf("    {val:\"%d\", txt:\"%s\"},\n", $item->id, $item->name);
    }
    $str .= sprintf("  ]%s\n", $lastchr);
    return $str;
  }
}
