<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.partials._content');
});

Route::get('user/create',['as' => 'user.create', 'uses' => 'UserController@create']);
Route::get('user/list',['as' => 'user.list', 'uses' => 'UserController@index']);
Route::post('user/store',['as' => 'user.store', 'uses' => 'UserController@store']);
Route::get('test', function ()
{
	dd(public_path().'\storage');
});