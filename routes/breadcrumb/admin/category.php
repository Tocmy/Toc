<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.categories.index', function(Trail $trail){
    $trail->push(__('categories'), route('admin.dashboards.index'));
});




?>
