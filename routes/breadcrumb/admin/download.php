<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



Breadcrumbs::for('admin.downloads.index', function(Trail $trail){
    $trail->push(__('download management'), route('admin.dashboards.index'));
});

?>
