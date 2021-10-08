<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Downloads'],function () {

    Route::resource('/downloads', DownloadController::class);
    Route::resource('/download-groups', DownloadGroupController::class);


});

?>
