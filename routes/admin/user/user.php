<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'User'],function () {

Route::resource('/users', UserController::class);


});

?>
