<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' =>['auth','verifyrole:admin']],function () {

    require __DIR__ .'/admin/address.php';
    require __DIR__ .'/admin/affiliate.php';
    require __DIR__ .'/admin/backup.php';
    require __DIR__ .'/admin/category.php';
    require __DIR__ .'/admin/company.php';
    require __DIR__ .'/admin/download.php';
    require __DIR__ .'/admin/user/user.php';
});





