<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Pages',

], function(){


    Route::resource('pages', PageController::class);
    Route::resource('pagegroups', PageGroupController::class);




});












