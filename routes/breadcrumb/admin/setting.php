<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;




Breadcrumbs::for('admin.settings.index', function(Trail $trail){
    $trail->push(__('setting management'), route('admin.dashboards.index'));
});




Breadcrumbs::for('admin.setting-groups.index', function(Trail $trail){
    $trail->push(__('setting group management'), route('admin.dashboards.index'));
});

Breadcrumbs::for('admin.lengths.index', function(Trail $trail){
    $trail->push(__('lengths management'), route('admin.dashboards.index'));
});

Breadcrumbs::for('admin.weigths.index', function(Trail $trail){
    $trail->push(__('weigths management'), route('admin.dashboards.index'));
});


Breadcrumbs::for('admin.statuses.index', function(Trail $trail){
    $trail->push(__('status management'), route('admin.dashboards.index'));
});


Breadcrumbs::for('admin.taxes.index', function(Trail $trail){
    $trail->push(__('taxes management'), route('admin.dashboards.index'));
});

?>
