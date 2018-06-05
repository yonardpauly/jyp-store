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
Route::post('/checkout', 'CheckoutController@storeCheckout')->name('shop.storeCheckout');
Route::post('/reports/{date?}', 'AdminController@showFilteredReportDate')->name('admin.searchDate');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:admin')->group(function () {
    Route::resource('customers', 'CustomerController');
    Route::resource('roles', 'RoleController');
    Route::resource('products', 'ProductController');
    Route::resource('item_categories', 'ItemCategoryController');
    Route::post('/orderFeedback/{order_id}', 'AdminController@submitOrderFeedBack')->name('admin.submitOrderFeedback');
    Route::get('/orderFeedback/{order_id}', 'AdminController@orderFeedback')->name('admin.orderFeedback');
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

Route::get('/', 'ShopController@index')->name('shop.index');
Route::post('/{slug}', 'ShopController@guestAddToCart')->name('shop.guestAdd');
Route::get('/cart', 'ShopController@showCart')->name('shop.cart');

Route::middleware('auth:web')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
    Route::get('/checkout', 'ShopController@showCheckout')->name('shop.checkout');
});