<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.purchases.index', function(Trail $trail){
    $trail->push(__('purchase management'), route('admin.dashboards.index'));
});




?>
