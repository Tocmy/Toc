<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Marketings',

], function(){


    Route::get('faq/status/{id}', 'FaqController@status')->name('faq.status');
    Route::Post('faq/status',['uses'=>'FaqController@UpdateStatus', 'as'=> 'faq.status']);
    Route::resource('faqs', FaqController::class);
    Route::resource('faqgroups', FaqGroupController::class);




    Route::resource('/loyalties', LoyaltyController::class);
    Route::resource('/loyaltygroups', LoyaltyGroupController::class);

    Route::resource('/campaigns', CampaignController::class);
    Route::resource('/newsletters', NewletterController::class);
    Route::resource('/subscribers', SubscriberController::class);


    Route::resource('promotions', PromotionController::class);

});












