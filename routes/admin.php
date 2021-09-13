<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' =>['auth','verifyrole:admin']],function () {

    require __DIR__ .'/admin/address.php';
    require __DIR__ .'/admin/user/user.php';
});





