<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.promotions.index', function(Trail $trail){
    $trail->push(__('promotion management'), route('admin.dashboards.index'));
});




?>
