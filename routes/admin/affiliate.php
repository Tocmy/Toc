<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Affiliate'],function () {

    Route::resource('/affiliates', AffiliateController::class);


});

?>
