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
Route::group(['prefix' => 'thuthuy'], function(){
    Route::view('/','thuthuy.pages.index');

    Route::resource('categories', 'CategoryController');

    Route::resource('product_types', 'ProductTypeController');
    
    Route::resource('products', 'ProductController');
});

