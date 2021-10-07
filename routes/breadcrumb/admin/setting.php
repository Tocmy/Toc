<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;




Breadcrumbs::for('admin.settings.index', function(Trail $trail){
    $trail->push(__('setting management'), route('admin.dashboards.index'));
});




Breadcrumbs::for('admin.setting-groups.index', function(Trail $trail){
    $trail->push(__('setting group management'), route('admin.dashboards.index'));
});

?>
