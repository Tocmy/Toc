<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.modules.index', function(Trail $trail){
    $trail->push(__('modules management'), route('admin.dashboards.index'));
});




?>
