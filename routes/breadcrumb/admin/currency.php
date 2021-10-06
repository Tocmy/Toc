<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



Breadcrumbs::for('admin.currencies.index', function(Trail $trail){
    $trail->push(__('currencies management'), route('admin.dashboards.index'));
});

?>
