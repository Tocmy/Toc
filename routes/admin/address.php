<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Address'],function () {

    Route::resource('/countries', CountryController::class);
    Route::resource('/geos', GeoController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/states', StateController::class);
    Route::resource('/zones', ZoneController::class);

});

?>
