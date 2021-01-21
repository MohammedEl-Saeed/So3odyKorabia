<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\Auth\AuthController::class, 'refresh']);
    Route::get('/user-profile', [\App\Http\Controllers\Auth\AuthController::class, 'userProfile']);
    Route::post('/edit-profile', [\App\Http\Controllers\Auth\AuthController::class, 'editProfile'])->middleware('jwtMiddleware');

    Route::post('/send-code', '\App\Http\Controllers\Auth\AuthController@sendCode');
    Route::post('/verify-code', 'Auth\AuthController@checkCode');
    Route::post('/reset-password', 'Auth\AuthController@resetNewPassword');

});
//Route::Post('user/login', 'Auth\AuthController@login')->name('user.login');
Route::group(['middleware' => ['jwtMiddleware']], function () {
//    Route::get('/edit-profile', [\App\Http\Controllers\Auth\AuthController::class, 'editProfile']);

    Route::post('/add-to-cart', 'API\CartController@addToCart');
    Route::post('/show-cart-info', 'API\CartController@showCartInfo');
    Route::post('/empty-cart', 'API\CartController@emptyCart');
    Route::post('/remove-from-cart', 'API\CartController@removeFromCart');
    Route::post('/edit-cart', 'API\CartController@editCart');

    Route::post('new-order', 'API\OrderController@createOrder');
    Route::post('get-orders', 'API\OrderController@getOrders');
    Route::post('re-order', 'API\OrderController@reOrder');
    Route::post('order-status', 'API\OrderController@orderStatus');

    Route::post('add-address', 'API\UserAddressController@addAddress');
    Route::post('update-address', 'API\UserAddressController@updateAddress');
    Route::post('remove-address', 'API\UserAddressController@removeAddress');
    Route::get('get-addresses', 'API\UserAddressController@getUserAddresses');

    Route::post('send-message', 'API\MessageController@createMessage');

    Route::post('check-promo-code', 'API\OrderController@checkCode');

    Route::apiResource('user/paymentCards', "API\PaymentCardsController");


});
Route::get('/create-pay-form', 'API\VapulusPaymentController@createPayForm')->name('createPayForm');
Route::get('get-main-categories', 'API\ProductController@getMainCategories');


Route::post('/get-options', 'API\ItemController@getOptionsByItemId');
Route::post('/get-items', 'API\ItemController@getItems');
Route::post('/get-products', 'API\ProductController@getProducts');
Route::get('get-cities', 'API\OrderController@getCities');
Route::get('get-offers', 'API\OrderController@getOffers');
