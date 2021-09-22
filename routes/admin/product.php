<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Products',

], function(){


Route::resource('products', ProductController::class);




});












