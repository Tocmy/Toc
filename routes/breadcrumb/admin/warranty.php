<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.warranties.index', function(Trail $trail){
    $trail->push(__('warranties management'), route('admin.dashboards.index'));
});




?>
