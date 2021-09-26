<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Brands',

], function(){


    Route::resource('brand', BrandController::class);




});












