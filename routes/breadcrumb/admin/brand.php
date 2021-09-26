<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.brands.index', function(Trail $trail){
    $trail->push(__('brands'), route('admin.dashboards.index'));
});



?>
