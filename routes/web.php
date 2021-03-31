<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
 */

// Route::get('/test', 'ScrapedCategoryController@search');
Route::get('/', 'IndexController@index');
Route::get('/single/categoryposts/{id}', 'IndexController@singlecategory')->name('categoryposts');
Route::get('/search', 'SearchController@search')->name('search');
Route::get('/best-promotion', 'ProductController@best_promotion')->name('best_promotion');
Route::get('/single-product', function () {
    return view('frontEnd/single-product');
});
Route::get('/my-account', 'MyAccountController@index');
Route::get('/product-list', function () {
    return view('frontEnd/product-list');
});
Route::get('/check', 'IndexController@check');

Route::get('/contact-us', function () {
    return view('frontEnd/contact-us');
});
Route::get('/about', function () {
    return view('frontEnd/about');
});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
Route::get('login', function () {
    return redirect('/');
})->name('login');

Route::get('register', function () {
    return redirect('/my-account');
})->name('register');

// !Admin routes
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['check_role']], function () {
        Route::resource('scraped_categories', 'ScrapedCategoryController');
        Route::resource('roles', 'RoleController');
        Route::resource('category_links', 'CategoryLinkController');
        Route::resource('category_nodes', 'CategoryNodeController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('users', 'UserController');
        // Route::resource('search-websites', 'SearchWebsiteController');
        Route::resource('single-product', 'SingleProductController');
        Route::resource('websites', 'WebsiteController');
        Route::resource('products', 'ProductController');
        Route::get('product-refresh', 'UpdatePricesController@index')->name('update_price.index');
        Route::resource('slider', 'SliderController');
        Route::resource('categories', 'CategoryController');
        Route::resource('brands', 'BrandController');
        Route::resource('product_links', 'ProductLinkController');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('blog', 'BlogController');
        Route::get('/get-products', 'ScrapedCategoryController@store')->name('get_products');
        Route::resource('/recipecategory', 'RecipeCategoryController');
    });
});

// ! User Routes
Route::group(['middleware' => ['auth']], function () {
    Route::resource('wishlist', 'WishlistController');
    Route::post('update-profile', 'ProfileController@changePassword')->name('change.password');
    Route::post('update-password', 'ProfileController@update')->name('profile.update');
    Route::resource('cart', 'CartController');

    Route::resource('collection', 'CollectionController');
});

//! Socail Auths
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

//! Blogs
Route::get('/blogs', 'BlogController@viewAllBlogs');
Route::get('/singlepage/{id}', 'BlogController@singlepage')->name('singlepage');

// ! Search
Route::get('search', 'SearchController@searchitem')->name('searchitem');
Route::get('category/{id}', 'CategoryController@show')->name('category.search');

// !
Route::get('/specific/{id}', 'CollectionController@showSpecificCollection')->name('showSpecific');

Route::post('/addproduct', 'BlogController@addproducts')->name('addproduct');

// Route::get('/test', function()
// {
//     return View::make('frontEnd.cart');
// });

Route::get('/viewcart', 'CartController@view')->name('viewCart');

Route::resource('/advertisement', 'AdvertisementController');
Route::get('/view', 'AdvertisementController@view');
