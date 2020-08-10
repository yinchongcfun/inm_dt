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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::Post('login', ['uses' => 'LoginController@login']);

    Route::Post('product/create', ['uses' => 'ProductController@create']);

    Route::get('order/list', ['uses' => 'OrderController@orderList']);

});

