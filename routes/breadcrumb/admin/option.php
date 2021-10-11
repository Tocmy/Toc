<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.options.index', function(Trail $trail){
    $trail->push(__('options management'), route('admin.dashboards.index'));
});




?>
