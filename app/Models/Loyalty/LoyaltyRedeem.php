<?php

namespace App\Models\Loyalty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyRedeem extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'loyalty_redeems';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'redeem_date', 'redeem_ip', 'loyalty_id', 'customer_id', 'order_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'redeem_date' => NULL,
        'redeem_ip' => '',
        'loyalty_id' => 0,
        'customer_id' => 0,
        'order_id' => 0,
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'redeem_date',
    ];
}
