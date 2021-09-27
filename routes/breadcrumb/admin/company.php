<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.company.index', function(Trail $trail){
    $trail->push(__('company Management'), route('admin.dashboards.index'));
});




?>
