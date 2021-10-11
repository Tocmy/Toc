<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.news.index', function(Trail $trail){
    $trail->push(__('news management'), route('admin.dashboards.index'));
});




?>
