<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Companies',

], function(){


    Route::resource('/companies', CompanyController::class);




});












