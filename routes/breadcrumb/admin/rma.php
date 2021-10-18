<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.rmas.index', function(Trail $trail){
    $trail->push(__('rma management'), route('admin.dashboards.index'));
});




?>
