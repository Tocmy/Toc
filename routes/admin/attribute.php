<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Attributes',

], function(){


    Route::resource('attribute', AttributeController::class);
    Route::resource('attributegroup', AttributeGroupController::class);



});












