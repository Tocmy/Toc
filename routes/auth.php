<?php


use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'],
    function () {

Route::get('/register','RegisterUserController@create')
        ->name('register');

Route::post('/register', 'RegisterUserController@store')
      ->name('register');

Route::get('/login','AuthenticatedSessionController@create')
      ->name('login');

Route::post('/login','AuthenticatedSessionController@store')
      ->name('login');

Route::get('/forgot-password','ForgotPasswordController@create')
      ->name('password.request');

Route::post('/forgot-password','ForgotPasswordController@store')
      ->name('password.email');

Route::get('/reset-password/{token}','ResetPasswordController@create')
      ->name('password.reset');

Route::post('/reset-password','ResetPasswordController@store')
      ->name('password.update');


});


Route::group(['middleware' => 'auth' ],function () {

Route::get('/verify-email','VerificationController')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}','VerifyEmailController')
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', 'VerifyNotificationController@store')
     ->middleware('throttle:6,1')
     ->name('verification.send');


Route::get('/confirm-password','ConfirmablePasswordController@show')
     ->name('password.confirm');

Route::post('/confirm-password', 'ConfirmablePasswordController@store')
      ->name('password.confirm');

Route::post('/logout','AuthenticatedSessionController@destroy')
      ->name('logout');

});

Route::get('/security', 'SecurityController@show')->name('security.show');
Route::post('/security-secret', 'SecurityController@generateTwoFactorSecret')->name('security.2faCode');
Route::post('/security-enable', 'SecurityController@enable')->name('security.enable');
Route::post('/security-disable', 'SecurityController@disable')->name('security.disable');
Route::post('/security-verify', 'SecurityController@verify2fa')->name('security.verify')->middleware('2fa');
