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
    Route::delete('categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::post('categories/del', 'CategoryController@delAll')->name('categories.delAll');

    Route::resource('product-types', 'ProductTypeController');
    Route::post('product-types/del','ProductTypeController@delAll')->name('product-types.delAll');
    Route::delete('product-types/{id}', 'ProductTypeController@destroy')->name('product-types.destroy');

    Route::resource('products', 'ProductController');
    Route::get('products/{id}/list', 'ProductController@listProduct')->name('products.list');
});

