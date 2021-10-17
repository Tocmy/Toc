<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.quotations.index', function(Trail $trail){
    $trail->push(__('quotation management'), route('admin.dashboards.index'));
});




?>
