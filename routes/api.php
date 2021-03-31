<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('get-product-details/{id}', 'IndexController@get_product_details')->name('get-product-details');
// Route::post('add-to-cart', 'IndexController@add_tot_cart')->name('add_tot_cart');

// !Auth
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');
    Route::post('passwordchange/{id}', 'Api\AuthController@change_password');
    Route::post('forgot_password', 'Api\AuthController@forgot_password');
});
//!Products
Route::apiResource('products','Api\ProductController')->only('index','show');
Route::post('products/{id}', 'Api\ProductController@get_product');
Route::post('stores', 'Api\ProductController@listStores');
Route::post('search', 'Api\ProductController@search');
Route::post('search', 'Api\ProductController@search');
Route::get('categorylist', 'Api\ProductController@categorylist');


// Middleware 
Route::group([
    'middleware' => 'auth:api'
], function () {
//! Carts 
Route::post('store','Api\CartController@storeCart');
Route::post('specificUserCart','Api\CartController@specificUserCart');
Route::post('update','Api\CartController@update');
Route::post('delete','Api\CartController@destroy');
// ! Collection Routes
Route::apiResource('collection', 'Api\CollectionController');
Route::post('collectiondelete/{id}', 'Api\CollectionController@delete');
// ! User's Auth
Route::post('logout', 'Api\AuthController@logout');
Route::get('user', 'Api\AuthController@user');

//! Wishlist
Route::resource('wishlist', 'Api\WishlistController');
Route::post('wishlistDelete','Api\WishlistController@destroy');
Route::get('specificWishlist','Api\WishlistController@specificWishlist');
});

// ! Recipe Routes 
Route::resource('recipe', 'Api\RecipeController');





