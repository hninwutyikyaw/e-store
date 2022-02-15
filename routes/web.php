<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\FrontendController@index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth', 'isAdmin']], function(){
    Route::get('dashboard', 'Admin\FrontendController@index');
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@create');
    Route::post('store-category', 'Admin\CategoryController@store');
    Route::get('edit-category/{id}', 'Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'Admin\CategoryController@update');
    Route::delete('delete-category/{id}', 'Admin\CategoryController@destroy');

    Route::resource('products', 'Admin\ProductController');
    Route::resource('sliders', 'Admin\SliderController');

});

