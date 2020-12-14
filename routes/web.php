<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/produk', 'ProductController@index');
Route::get('/produk/{id}', 'ProductController@show');

Route::get('/keranjang', 'KeranjangController@index');
Route::get('/keranjang/remove/{cartID}', 'KeranjangController@destroy');
Route::post('/keranjang', 'KeranjangController@store');
Route::post('/keranjang/update', 'KeranjangController@update');

Route::get('orders/checkout', 'OrderController@checkout');
Route::post('orders/checkout', 'OrderController@doCheckout');
Route::post('orders/shipping-cost', 'OrderController@shippingCost');
Route::post('orders/set-shipping', 'OrderController@setShipping');
Route::get('orders/received/{id}', 'OrderController@received');
Route::get('orders/cities', 'OrderController@cities');

Route::get('profile', 'Auth\ProfileController@index');
Route::post('profile', 'Auth\ProfileController@update');

Route::post('payments/notification', 'PaymentController@notification');
Route::get('payments/completed', 'PaymentController@completed');
Route::get('payments/failed', 'PaymentController@failed');
Route::get('payments/unfinish', 'PaymentController@unfinish');


Route::group(
    ["namespace" => 'Admin', 'prefix' => 'admin', 'middleware'=>['auth']],
    function(){
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('products', 'ProductController');
        Route::get('products/{productID}/images', 'ProductController@images');
        Route::get('products/{productID}/add-image', 'ProductController@add_image');
        Route::post('products/images/{productID}/', 'ProductController@upload_image');
        Route::delete('products/images/{imageID}/', 'ProductController@remove_image');

        Route::resource('orders', 'OrderController');
        Route::get('processing', 'OrderController@sudahbayar');

        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');

        Route::get('shipments', 'ShipmentController@index');
    }


);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

