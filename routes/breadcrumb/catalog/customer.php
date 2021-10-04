<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;


//customer accounts
Breadcrumbs::for('catalog.accounts.index', function(Trail $trail){
    $trail->push(__('accounts'), route('catalog.homes.index'));
});




?>
