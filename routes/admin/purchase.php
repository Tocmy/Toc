<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Purchases',

], function(){


Route::resource('/purchases', PurchaseController::class);




});












