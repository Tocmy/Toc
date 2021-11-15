<?php

namespace App\Models\Shipping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingRate extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'shipping_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'weight_range_start', 'weight_range_end', 'subtotal_range_start', 'subtotal_range_end', 'flat_charge', 'per_item_charge', 'subtotal_percent_charge', 'per_kg_charge', 'per_item_charge_class', 'max_length', 'min_length', 'max_height', 'min_height', 'max_width', 'min_width', 'length_plus_girth_max', 'length_height_width_sum_max', 'over_size_limit', 'allowed_as_return_service', 'shipping_id', 'supplier_id', 'state_id', 'weight_id', 'length_id', 'geo_id', 'surcharge_id', 'tax_rate_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'weight_range_start' => 0,
        'weight_range_end' => 0,
        'subtotal_range_start' => 0,
        'subtotal_range_end' => 0,
        'flat_charge' => 0,
        'per_item_charge' => 0,
        'subtotal_percent_charge' => 0,
        'per_kg_charge' => 0,
        'per_item_charge_class' => '',
        'max_length' => 0,
        'min_length' => 0,
        'max_height' => 0,
        'min_height' => 0,
        'max_width' => 0,
        'min_width' => 0,
        'length_plus_girth_max' => 0,
        'length_height_width_sum_max' => 0,
        'over_size_limit' => 0,
        'allowed_as_return_service' => false,
        'shipping_id' => 0,
        'supplier_id' => 0,
        'state_id' => 0,
        'weight_id' => 0,
        'length_id' => 0,
        'geo_id' => 0,
        'surcharge_id' => 0,
        'tax_rate_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'allowed_as_return_service' => 'boolean',
    ];

}
