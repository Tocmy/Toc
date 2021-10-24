<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;



//attribute group
Breadcrumbs::for('admin.vouchers.index', function(Trail $trail){
    $trail->push(__('voucher management'), route('admin.dashboards.index'));
});




?>
