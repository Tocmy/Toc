<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.banners.index', function(Trail $trail){
    $trail->push(__('banner'), route('admin.dashboards.index'));
});



?>
