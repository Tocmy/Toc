<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Suppliers'],function () {


    Route::resource('/suppliers', SupplierController::class);

    Route::resource('/suppliergroups', SupplierGroupController::class);



});

?>
