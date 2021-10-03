<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;




Breadcrumbs::for('admin.coupons.index', function(Trail $trail){
    $trail->push(__('coupon Management'), route('admin.dashboards.index'));
});




?>
