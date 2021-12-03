<?php


use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Warranties'],function () {


    //Route::get('/vouchers/status', 'VoucherController@changeStatus')->name('voucher.status');
    Route::resource('/warranties', WarrantyController::class);



});

?>
