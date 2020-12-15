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


//Route::get('/login', function () {
//    return view('admin.auth.admin-login');
//});

Route::group(['middleware' => ['admin_auth']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
//        Route::get('dashboard', 'Admin\ProductController@dashboard');
        //Route::resource('products', 'Admin\ProductController');
        Route::get('/{type}', 'Admin\ProductController@index')->name('index');
        Route::get('/{type}/create', 'Admin\ProductController@create')->name('create');
        Route::post('/', 'Admin\ProductController@store')->name('store');
        Route::get('/{type}/edit/{id}','Admin\ProductController@edit')->name('edit');
        Route::put('/update/{id}','Admin\ProductController@update')->name('update');
        Route::get('/{type}/available/{id}','Admin\ProductController@makeProductAvailable')->name('available');
        Route::get('/{type}/unavailable/{id}','Admin\ProductController@makeProductUnavailable')->name('unavailable');
        Route::get('/{type}/sold/{id}','Admin\ProductController@makeProductSold')->name('sold');
    });
//        Route::get('/{id}', 'Admin\ProductController@store')->name('subProduct.index');
    Route::resource('options', 'Admin\OptionController');

    Route::resource('users', 'Admin\UserController');
    Route::get('user/{id}/orders', 'Admin\UserController@userOrders')->name('user.orders');

    Route::resource('{id}/items', 'Admin\ItemController');
    Route::get('items/{productId}/available/{id}','Admin\ItemController@makeProductAvailable')->name('items.available');
    Route::get('items/{productId}/unavailable/{id}','Admin\ItemController@makeProductUnavailable')->name('items.unavailable');
    Route::put('item/update/{id}','Admin\ItemController@update')->name('items.update');
    Route::get('items/{productId}/sold/{id}','Admin\ItemController@makeProductSold')->name('items.sold');

    Route::resource('offers', 'Admin\OfferController');
    Route::resource('orders', 'Admin\OrderController');

    Route::get('orders/accept/{id}', 'Admin\OrderController@acceptOrder')->name('orders.accept');
    Route::get('orders/reject/{id}', 'Admin\OrderController@rejectOrder')->name('orders.reject');
    Route::get('orders/done/{id}', 'Admin\OrderController@doneOrder')->name('orders.done');
//});

    Route::resource('options', 'Admin\OptionController');

    Route::resource('offers', 'Admin\OfferController');

    Route::resource('orders', 'Admin\OrderController');

    Route::resource('cities', 'Admin\CityController');

//    Route::get('orders/accept/{id}', 'Admin\OrderController@acceptOrder')->name('orders.accept');
//    Route::get('orders/reject/{id}', 'Admin\OrderController@acceptOrder')->name('orders.reject');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
