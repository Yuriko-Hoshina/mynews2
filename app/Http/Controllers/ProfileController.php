<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Profile::all()->sortBy('name');
        
        if(count($posts)>0){
            $head = $posts->shift();
        }else{
            $head = null;
        }
        
        return view('profile.index', ['head'=>$head, 'posts'=>$posts]);
    }
}
