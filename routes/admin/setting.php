<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Settings'],function () {


    Route::resource('/lengths', LengthController::class);

    Route::resource('/settings', SettingController::class);

    Route::resource('/setting-groups', SettingGroupController::class);

    Route::resource('/weigths', WeigthController::class);

});

?>
