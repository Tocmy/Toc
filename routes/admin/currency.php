<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Currencies'],function () {

    Route::resource('/currencies', CurrencyController::class);


});

?>
