<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Banners',

], function(){


    Route::resource('banner', BannerController::class);
    Route::resource('bannergroup', BannerGroupController::class);



});












