<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Shippings'],function () {


    Route::resource('/carriers', CarrierController::class);



});

?>
