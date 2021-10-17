<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Quotations',

], function(){


Route::resource('/quotations', QuotationController::class);




});












