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

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('news2/create','Admin\NewsController@add');
    Route::post('news2/create','Admin\NewsController@create');
    Route::get('news2','Admin\NewsController@index');
    Route::get('news2/edit','Admin\NewsController@edit');
    Route::post('news2/edit','Admin\NewsController@update');
    Route::get('news/delete','Admin\NewsController@delete');
    Route::get('/','NewsController@index');
});

/*Route::get('XXX','Admin\AAAController@bbb');  課題用*/ 

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('profile2/create','Admin\ProfileController@add');
    Route::post('profile2/create','Admin\ProfileController@create');
    Route::get('profile2/edit','Admin\ProfileController@edit');
    Route::post('profile2/edit','Admin\ProfileController@update');
    Route::get('profile2','Admin\ProfileController@index');
    Route::get('profile2/delete','Admin\ProfileController@delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
