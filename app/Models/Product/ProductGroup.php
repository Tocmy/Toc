<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'product_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'setting_id', 'customer_group_id', 'customer_group_price', 'product_id', 'product_price', 'qty_block', 'min_order_qty', 'name', 'handler', 'image', 'master_group', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'setting_id' => 0,
        'customer_group_id' => 0,
        'customer_group_price' => '0.0000',
        'product_id' => 0,
        'product_price' => '0.0000',
        'qty_block' => 0,
        'min_order_qty' => 0,
        'name' => '',
        'handler' => '',
        'image' => '',
        'master_group' => NULL,
        'status' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'master_group' => 'boolean',
        'status' => 'boolean',
    ];
}
