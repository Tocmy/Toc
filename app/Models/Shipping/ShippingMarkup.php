<?php

namespace App\Models\Shipping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMarkup extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'shipping_markups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'shipping_id', 'state_id', 'min_weight', 'max_weight', 'min_total', 'max_total',
        'min_item', 'max_item', 'flat', 'percentage', 'per_item', 'per_weight',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'shipping_id' => 0,
        'state_id' => 0,
        'min_weight' => 0,
        'max_weight' => 0,
        'min_total' => 0,
        'max_total' => 0,
        'min_item' => 0,
        'max_item' => 0,
        'flat' => 0,
        'percentage' => 0,
        'per_item' => 0,
        'per_weight' => 0,
    ];

}
