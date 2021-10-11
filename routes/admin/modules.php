<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Modules',

], function(){


Route::resource('/modules', ModuleController::class);




});












