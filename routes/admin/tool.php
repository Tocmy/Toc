<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Tools',

], function(){

Route::get('/barcodes/set-defaults/{id}', 'BarcodeController@setDefault');
Route::resource('/barcodes', BarcodeController::class);





});












