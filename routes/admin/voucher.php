<?php


use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Vouchers'],function () {


    Route::get('/vouchers/status', 'VoucherController@changeStatus')->name('voucher.status');
    Route::resource('/vouchers', VoucherController::class);



});

?>
