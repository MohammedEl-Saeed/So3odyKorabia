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

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/login', function () {
    return view('admin.auth.admin-login');
});

//Route::group(['middleware' => ['admin_auth']], function () {
    Route::group(['prefix' => 'products','as' => 'products.'], function () {
        Route::get('dashboard', 'Admin\ProductController@dashboard');
    //Route::resource('products', 'Admin\ProductController');
        Route::get('/{type}', 'Admin\ProductController@index')->name('index');
        Route::get('/{type}/create', 'Admin\ProductController@create')->name('create');
        Route::post('/', 'Admin\ProductController@store')->name('store');
        Route::get('/{id}', 'Admin\ProductController@store')->name('subProduct.index');
    });
    Route::resource('options', 'Admin\OptionController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('{id}/items', 'Admin\ItemController');
    Route::resource('offers', 'Admin\OfferController');
    Route::resource('orders', 'Admin\OrderController');
    Route::get('orders/accept/{id}','Admin\OrderController@acceptOrder')->name('orders.accept');
    Route::get('orders/reject/{id}','Admin\OrderController@acceptOrder')->name('orders.reject');
//});
