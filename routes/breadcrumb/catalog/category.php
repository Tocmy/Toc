<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



Breadcrumbs::for('catalog.categories.index', function(Trail $trail){
    $trail->push(__('categories'), route('catalog.homes.index'));
});




?>
