<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.attributegroups.index', function(Trail $trail){
    $trail->push(__('attribute group'), route('admin.dashboards.index'));
});


//attribute
Breadcrumbs::for('admin.attributes.index', function(Trail $trail){
    $trail->push(__('attribute'), route('admin.dashboards.index'));
});

?>
