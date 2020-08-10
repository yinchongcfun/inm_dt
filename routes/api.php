<?php

use Illuminate\Http\Request;

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


Route::group(['namespace' => 'Api'], function () {

    Route::Post('shop/login', ['uses' => 'LoginController@shopLogin']);

    Route::get('product/list', ['uses' => 'ProductController@productList']);

    Route::get('order/pay', ['uses' => 'PayController@pay']);

    Route::get('order/create', ['uses' => 'OrderController@createOrder']);
});
