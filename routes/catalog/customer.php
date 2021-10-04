<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Customers'],function () {

    Route::resource('/accounts', AccountController::class);


});

?>
