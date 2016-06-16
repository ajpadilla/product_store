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

Route::get('/',['middleware' => ['auth','active_user'] ,function () {
    return view('layouts.partials._content');
}]);

Route::group(['middleware' => ['auth','active_user'] ], function(){

	Route::get('user/create',['as' => 'user.create', 'middleware' => 'auth','uses' => 'UserController@create']);
	Route::get('user/list',['as' => 'user.list', 'uses' => 'UserController@index']);
	Route::get('activate-user/{id}', ['as' => 'activate_user_path',
		'uses' => 'UserController@activateUser'
	]);

});

/*
********************************* route for model users ********************************
*/



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*
********************************* route for model countries ********************************
*/

Route::get('api/select/countries', 'CountryController@getAllValues');



Route::get('test', function ()
{
	dd(public_path().'\storage');
});