<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Marketings',

], function(){


    Route::get('faq/status/{id}', 'FaqController@status')->name('faq.status');
    Route::Post('faq/status',['uses'=>'FaqController@UpdateStatus', 'as'=> 'faq.status']);
    Route::resource('faqs', FaqController::class);
    Route::resource('faqgroups', FaqGroupController::class);




    Route::resource('loyalty', LoyaltyController::class);
    Route::resource('loyaltygroup', LoyaltyGroupController::class);




});












