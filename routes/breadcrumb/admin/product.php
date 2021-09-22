<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.auctions.index', function(Trail $trail){
    $trail->push(__('auction'), route('admin.dashboards.index'));
});




?>
