<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Categories',

], function(){

    Route::post('categories-massDestroy', 'CategoryController@massDestroy')->name('category.massdestroy');
    Route::post('categories-restore/{id}', 'CategoryController@restore')->name('category.restore');
    Route::delete('categories-forceDelete/{id}', 'CategoryController@forceDelete')->name('category.forcedelete');
    Route::resource('categories', CategoryController::class);




});












