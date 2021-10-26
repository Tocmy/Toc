<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;




Breadcrumbs::for('admin.suppliers.index', function(Trail $trail){
    $trail->push(__('supplier management'), route('admin.dashboards.index'));
});




Breadcrumbs::for('admin.suppliergroups.index', function(Trail $trail){
    $trail->push(__('supplier group management'), route('admin.dashboards.index'));
});



?>
