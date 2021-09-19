<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



Breadcrumbs::for('admin.affiliates.index', function(Trail $trail){
    $trail->push(__('affiliate'), route('admin.dashboards.index'));
});

?>
