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

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
    Route::resource('checkout', 'CheckoutController');
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::middleware('auth:admin')->group(function () {
    Route::resource('customers', 'HomeController');
    Route::resource('roles', 'RoleController');
    Route::resource('products', 'ProductController');
    Route::resource('item_categories', 'ItemCategoryController');
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'ShopController@index')->name('shop.index');
Route::post('/{slug}', 'ShopController@guestAddToCart')->name('shop.guestAdd');
Route::get('/cart', 'ShopController@showCart')->name('shop.cart');
Route::put('/cart/{id}', 'ShopController@updateCartItemQty')->name('shop.updateCartItemQty');