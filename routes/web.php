<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('news2/create','Admin\NewsController@add')->middleware('auth');   
});

/*Route::get('XXX','Admin\AAAController@bbb');  課題用*/ 

Route::group(['prefix'=>'admin'],function(){
    Route::get('profile2/create','Admin\ProfileController@add')->middleware('auth');
    Route::get('profile2/edit','Admin\ProfileController@edit')->middleware('auth');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
