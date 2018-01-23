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

use Auth\AuthController;

Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);

Route::group(['prefix' => 'user'], function()
{
	Route::group(['middleware' => 'guest'], function()
	{
		Route::get('/signup', [
			'uses' => 'UserController@getSignup',
			'as' => 'user.signup'
		]);

		Route::post('/signup', [
			'uses' => 'UserController@postSignup',
			'as' => 'user.signup'
		]);

		Route::get('/login', [
			'uses' => 'UserController@getLogin',
			'as' => 'user.login'
		]);

		Route::post('/login', [
			'uses' => 'UserController@postLogin',
			'as' => 'user.login'
		]);
	});

	Route::group(['middleware' => 'auth'], function()
	{
		Route::get('/profile', [
			'uses' => 'UserController@getProfile',
			'as' => 'user.profile'
		]);

		Route::get('/logout', [
			'uses' => 'UserController@getLogout',
			'as' => 'user.logout'
		]);
	});
});

Route::get('/add-to-cart/{id}', [
	'uses' => 'OrderCartController@getAddToCart',
	'as' => 'orderCart.AddToCart'
]);

Route::get('/add-to-wishlist-cart/{id}', [
	'uses' => 'WishlistCartController@getAddToWishlistCart',
	'as' => 'wishlistCart.AddToWishlistCart'
]);

Route::get('/shopping-cart', [
	'uses' => 'OrderCartController@getShoppingCart',
	'as' => 'orderCart.shopping-cart'
]);

Route::get('/shopping-wishlist-cart', [
	'uses' => 'WishlistCartController@getShoppingWishlistCart',
	'as' => 'wishlistCart.shopping-wishlist-cart'
]);

Route::get('/checkout', [
	'uses' => 'OrderCartController@getCheckout',
	'as' => 'orderCart.checkout',
	'middleware' => 'auth'
]);

Route::post('/checkout', [
	'uses' => 'OrderCartController@postCheckout',
	'as' => 'orderCart.checkout',
	'middleware' => 'auth'
]);

Route::get('/increase/{id}', [
    'uses' => 'OrderCartController@getIncreaseByOne',
    'as' => 'orderCart.increase-by-one'
]);

Route::get('/decrease/{id}', [
    'uses' => 'OrderCartController@getDecreaseByOne',
    'as' => 'orderCart.decrease-by-one'
]);

Route::get('/remove/{id}', [
    'uses' => 'OrderCartController@getRemoveItem',
    'as' => 'orderCart.remove'
]);

Route::get('/empty-cart', [
    'uses' => 'OrderCartController@getEmptyCart',
    'as' => 'orderCart.empty-cart'
]);

Route::get('/empty-wishlist-cart', [
    'uses' => 'WishlistCartController@getEmptyWishlistCart',
    'as' => 'wishlistCart.empty-wishlist-cart'
]);

Route::get('facebook', function () {
    return view('facebookAuth');
});

Route::get('/auth/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');

Route::get('google', function () {
    return view('googleAuth');
});

Route::get('/auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\AuthController@handleGoogleCallback');
