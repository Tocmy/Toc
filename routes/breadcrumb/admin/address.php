<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

//country

Breadcrumbs::for('admin.countries.index', function(Trail $trail){
    $trail->push(__('admin.countries'), route('admin.dashboard.index'));
});

?>
