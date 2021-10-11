<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Options',

], function(){

    Route::resource('options', OptionController::class);
    Route::resource('optionvalues', OptionValueController::class);




});












