<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'News',

], function(){


Route::resource('/news', NewsController::class);




});












