<?php

namespace App\Models\Insurance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    * The Purpose of this, when shopper require to purchase insurance for their purchaser to cover the shipping.
    * 
    * @var  string
    */
    protected $table = 'insurances';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'required', 'type', 'period', 'increment_amount', 'status', 'percentage', 'min_fee', 'shipping_id', 'order_id', 'insurance_rate_id', 'insurance_rule_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'required' => false,
        'type' => '',
        'period' => NULL,
        'increment_amount' => '0.0000',
        'status' => false,
        'percentage' => 0,
        'min_fee' => 0,
        'shipping_id' => 0,
        'order_id' => 0,
        'insurance_rate_id' => 0,
        'insurance_rule_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'required' => 'boolean',
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'period',
    ];

}
