<?php


use Illuminate\Support\Facades\Route;



Route::group([
    'namespace' => 'Tools',

], function(){


    Route::post('/backups/upload', 'BackupController@upload')->name('backups.upload');
    Route::post('/backups/{filename}/restore', 'BackupController@restore')->name('backups.restore');
    Route::get('/backups/{filename}/dl', 'BackupController@download')->name('backups.download');
    Route::resource('/backups', BackupController::class,['except' =>['create','edit']]);




});














?>
