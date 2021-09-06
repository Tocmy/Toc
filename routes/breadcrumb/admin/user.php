<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;


Breadcrumbs::for('admin.users.index', function(Trail $trail){
    $trail->push(__('admin.users'), route('admin.dashboard.index'));
});

Breadcrumbs::for('admin.users.create', function(Trail $trail){
    $trail
       ->parent('admin.users.index', route('admin.users.index'))
       ->push(__('Add New User'), route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function(Trail $trail){
    $trail
       ->parent('admin.users.index', route('admin.users.index'))
       ->push(__('Edit Users'), route('admin.users.edit'));
});

?>
