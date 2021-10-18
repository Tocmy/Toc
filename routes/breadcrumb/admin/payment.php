<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.payments.index', function(Trail $trail){
    $trail->push(__('payment management'), route('admin.dashboards.index'));
});




?>
