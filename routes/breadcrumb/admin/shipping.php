<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;




Breadcrumbs::for('admin.carriers.index', function(Trail $trail){
    $trail->push(__('Carrier Management'), route('admin.dashboards.index'));
});





?>
