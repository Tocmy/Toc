<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Rmas'],function () {

    Route::resource('/rmas', RmaController::class);
   


});

?>
