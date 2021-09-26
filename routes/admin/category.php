<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Categories',

], function(){


    Route::resource('categories', CategoryController::class);




});












