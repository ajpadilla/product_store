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

Route::get('/',['middleware' => [], 'as' => 'home', function () {
    return view('public.index');
}]);

Route::get('/dashboard',['middleware' => ['auth','active_user'] ,function () {
    return view('layouts.partials._content');
}]);

//Middleware for user client
Route::group(['middleware' => ['auth','active_user'] ],function()
{	
	Route::get('/dashboard', function () {
    	return view('layouts.partials._content');
	});

	/*
		********************************* route for model carts ********************************
	*/

	Route::get('api/create/cart/user/{productId}/{quantity?}', ['as' => 'cart.store', 'uses' => 'CartController@store']);

	Route::get('show/cart/{id}', ['as' => 'cart.show', 'uses' => 'CartController@show']);

	Route::get('cart/change-quantity/{productId}/{quantity}', [
		'as' => 'cart.change-quantity',
		'uses' => 'CartController@changeQuantity'
	]);

	Route::get('api/delete-product-cart/{id}', [
		'as' =>'cart.delete-ajax', 
		'uses' => 'CartController@deleteAjax', 
	]);

	/*
		********************************* route for model products ********************************
	*/

	Route::get('show/product/{id}', ['as' => 'product.show', 'uses' => 'ProductController@show']);


	/*
		********************************* route for model paypal ********************************
	*/

	// Enviamos nuestro pedido a PayPal
	Route::get('payment', array(
		'as' => 'payment',
		'uses' => 'PaypalController@postPayment',
	));
	// Después de realizar el pago Paypal redirecciona a esta ruta
	Route::get('payment/status', array(
		'as' => 'payment.status',
		'uses' => 'PaypalController@getPaymentStatus',
	));

});


//Middleware for user admin
Route::group(['middleware' => ['auth','active_user_admin'] ], function(){

/*
	********************************* route for model users ********************************
*/
	Route::get('user/create',['as' => 'user.create','uses' => 'UserController@create']);
	Route::get('user/list',['as' => 'user.list', 'uses' => 'UserController@index']);

/*
********************************* route for model products ********************************
*/

	Route::post('product/store',['as' => 'product.store', 
		'uses' => 'ProductController@store']
	);

	Route::get('product/create', ['as' => 'product.create', 
		'uses' => 'ProductController@create']
	);

	Route::get('product/edit/{id}', ['as' => 'product.edit', 
		'uses' => 'ProductController@edit']);

	Route::post('product/update/{id}', ['as' => 'product.update', 
		'uses' => 'ProductController@update']);

	Route::get('product/list', ['as' => 'product.list', 
		'uses' => 'ProductController@index']
	);

	Route::get('product/datatables', ['as' => 'api.datatables.product', 
		'uses' => 'ProductController@dataTable']);

	/*
		********************************* route for model photo product ********************************
	*/

	Route::get('create/photo/product/{productId}', ['as' => 'photoProduct.create', 
		'uses' => 'ProductController@createPhoto'
	]);

	Route::get('edit/photo/product/{productId}', ['as' => 'photoProduct.edit', 
		'uses' => 'ProductController@editPhoto'
	]);

	Route::get('api/list/photo/product/{productId}', ['as' => 'photoProduct.list', 
		'uses' => 'ProductController@listPhoto'
	]);

	Route::get('delete/photo/product/{photoId}', ['as' => 'photoProduct.delete', 
		'uses' => 'ProductController@deletePhoto'
	]);

	Route::post('add/photo/product', ['as' => 'photoProduct.store', 
		'uses' => 'ProductController@storePhoto'
	]);

	Route::get('api/show/info/product/{productId}', 'ProductController@showApi');

	Route::get('api/delete/product/{productId}', 'ProductController@destroyApi');

/*
	********************************* route for model classification ********************************
*/

	Route::get('classification/create', ['as' => 'classification.create', 
		'uses' => 'ClassificationController@create']
	);

	Route::post('classification/store', ['as' => 'classification.store', 
		'uses' => 'ClassificationController@store']
	);

	Route::get('classification/list', ['as' => 'classification.list', 
		'uses' => 'ClassificationController@index']
	);

	Route::get('classification/datatables', ['as' => 'api.datatables.classification', 
		'uses' => 'ClassificationController@dataTable']);

	Route::get('classification/edit/{id}', ['as' => 'classification.edit', 
		'uses' => 'ClassificationController@edit']);

	Route::post('classification/update/{id}', ['as' => 'classification.update', 
		'uses' => 'ClassificationController@update']);

	Route::get('classification/delete/{id}', ['as' => 'classification.delete', 
		'uses' => 'ClassificationController@destroy']);

	Route::get('api/select/classifications', 'ClassificationController@getAllValues');

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