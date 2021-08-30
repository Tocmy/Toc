<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'User'],function () {

Route::resource('user', UserController::class);


});

?>
