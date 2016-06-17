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

/*
	********************************* route for model users ********************************
*/
	Route::get('user/create',['as' => 'user.create','uses' => 'UserController@create']);
	Route::get('user/list',['as' => 'user.list', 'uses' => 'UserController@index']);

/*
********************************* route for model products ********************************
*/

/*
	********************************* route for model classification ********************************
*/

	Route::get('classification/create', ['as' => 'classification.create', 
		'uses' => 'ClassificationController@create']
	);

	Route::get('classification/store', ['as' => 'classification.store', 
		'uses' => 'ClassificationController@store']
	);

	Route::get('classification/list', ['as' => 'classification.list', 
		'uses' => 'ClassificationController@index']
	);

});

/*
********************************* route for model users ********************************
*/

Route::get('test/role', 'UserController@testRoute');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('user/store',['as' => 'user.store', 'uses' => 'UserController@store']);
Route::get('activate-user/{id}', ['as' => 'activate_user_path', 'uses' => 'UserController@activateUser'
	]);

/*
********************************* route for model countries ********************************
*/

Route::get('api/select/countries', 'CountryController@getAllValues');



Route::get('test', function ()
{
	dd(public_path().'\storage');
});