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

// Admin

Route::get('thuthuy/login','AdminLoginController@getLogin')->name('login.admin');
Route::post('thuthuy/login','AdminLoginController@postLogin')->name('admin.login');
Route::get('thuthuy/logout','AdminLoginController@getLogout')->name('logout.admin');

Route::group(['prefix' => 'thuthuy','middleware' => 'CheckAdminLogin'], function(){
    Route::view('/','thuthuy.pages.index');

    Route::resource('categories', 'CategoryController');
    Route::delete('categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::post('categories/del', 'CategoryController@delAll')->name('categories.delAll');

    Route::resource('product-types', 'ProductTypeController');
    Route::post('product-types/del','ProductTypeController@delAll')->name('product-types.delAll');
    Route::post('/search/product-types', 'ProductTypeController@search')->name('product-types.search');
    Route::get('product-types/{id_category}/list', 'ProductTypeController@listProductType');

    Route::resource('products', 'ProductController');
    Route::post('products/del', 'ProductController@delAll')->name('products.delAll');
    Route::get('products/{id}/details', 'ProductController@detailsProduct')->name('products.details');
    Route::post('/search/products', 'ProductController@search')->name('products.search');
    Route::post('update-products/{id}', 'ProductController@updateAjax');
    Route::post('products/{id}', 'ProductController@update')->name('products.update');
    
    Route::resource('introduces', 'IntroduceController');
    Route::post('introduces/del', 'IntroduceController@delAll')->name('introduces.delAll');
    Route::get('introduces/{id}/details', 'IntroduceController@edit')->name('introduces.edit');
    Route::post('introduces/{id}', 'IntroduceController@update')->name('introduces.update');
    
    Route::resource('admins', 'AdminController');
    Route::get('admis/{id}/details', 'AdminController@edit')->name('admins.edit');
    Route::post('admis/{id}/details', 'AdminController@update')->name('admins.update');
    Route::post('admins/changepassword','AdminController@changePassword')->name('admins.changePassword');

    Route::resource('content-types', 'ContentTypeController');
    Route::post('content-types/del', 'ContentTypeController@delAll')->name('content-types.delAll');

    Route::resource('contents', 'ContentController');
    Route::post('contents/del', 'ContentController@delAll')->name('contents.delAll');
    Route::post('contents/{id}', 'ContentController@update')->name('contents.update');

    Route::resource('ales', 'AleController');
    Route::post('ales/del', 'AleController@delAll')->name('ales.delAll');
    Route::post('update-ales/{id}','AleController@update');

    Route::resource('image-types', 'ImageTypeController');

    Route::resource('logos', 'LogoController');
    Route::post('logos/del', 'LogoController@delAll')->name('logos.delAll');
    Route::post('update-logos/{id}','LogoController@update');

    Route::resource('banners', 'BannerController');
    Route::post('banners/del', 'BannerController@delAll')->name('banners.delAll');
    Route::post('update-banners/{id}','BannerController@update');

    Route::resource('slides', 'SlideController');
    Route::post('slides/del', 'SlideController@delAll')->name('slides.delAll');
    Route::post('update-slides/{id}','SlideController@update');

    Route::resource('customer-messages', 'CustomerMessageController');
    Route::post('customer-messages/del', 'CustomerMessageController@delAll')->name('customer-messages.delAll');
});

Route::get('get-product-type','AjaxController@getProductType');

//Client 

Route::get('/','HomeController@index');
Route::get('contact', 'HomeController@contact')->name('contact.form');
Route::post('contact', 'CustomerMessageController@store')->name('contact.store');
Route::get('about-us', 'HomeController@aboutUs')->name('about_us.index');
Route::get('blogs/{slug}', 'HomeController@blogPage')->name('blogs');
Route::get('detail/{id}', 'HomeController@ajaxModal');
Route::get('collections/{slug}', 'HomeController@collection')->name('collections');
Route::get('collections/{slug}/list', 'HomeController@collectionList')->name('collections.list');



