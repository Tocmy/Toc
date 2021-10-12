<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.pages.index', function(Trail $trail){
    $trail->push(__('pages management'), route('admin.dashboards.index'));
});




?>
