<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Vouchers'],function () {

    Route::resource('/vouchers', VoucherController::class);



});

?>
