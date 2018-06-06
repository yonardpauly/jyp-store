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
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')->group(function () {

    Route::resource('customers', 'CustomerController');
    Route::resource('products', 'ProductController');
    Route::resource('item_categories', 'ItemCategoryController');
    Route::post('/orderFeedback/{order_id}', 'AdminController@submitOrderFeedBack')->name('admin.submitOrderFeedback');
    Route::post('/rejected/{order_id}', 'AdminController@submitRejectedFeedback')->name('admin.submitRejectedFeedback');
    Route::get('/orderFeedback/{order_id}', 'AdminController@orderFeedback')->name('admin.orderFeedback');
    Route::get('/rejected/{order_id}', 'AdminController@showRejectedFeedback')->name('admin.rejectedFeedback');
    Route::get('/reports', 'AdminController@showReports')->name('admin.reports');
});

Route::prefix('admin')->group(function () {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::post('/checkout', 'ShopController@storeCheckout')
->name('shop.storeCheckout')->middleware('auth');
Route::get('/', 'ShopController@index')->name('shop.index');
Route::post('/{slug}', 'ShopController@guestAddToCart')->name('shop.guestAdd');
Route::get('/cart', 'ShopController@showCart')->name('shop.cart');

Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
    Route::get('/checkout', 'ShopController@showCheckout')->name('shop.checkout');
});