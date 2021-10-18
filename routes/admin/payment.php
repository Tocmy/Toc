<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Payments',

], function(){


    Route::resource('/payments', PaymentController::class);
   




});












