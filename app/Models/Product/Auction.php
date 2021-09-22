<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory, SoftDeletes;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'auctions';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_id', 'bid_min_increase', 'expires_date', 'status', 'overbid_amount', 'notified', 'auction_paid', 'auctions_nb', 'auctions_max', 'auctions_high_cust', 'auction_clock', 'buynow_price', 'reserve_price', 'start_price', 'auction_start',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'product_id' => 0,
        'bid_min_increase' => '0.0000',
        'expires_date' => NULL,
        'status' => false,
        'overbid_amount' => NULL,
        'notified' => false,
        'auction_paid' => false,
        'auctions_nb' => 0,
        'auctions_max' => '0.0000',
        'auctions_high_cust' => 0,
        'auction_clock' => false,
        'buynow_price' => '0.0000',
        'reserve_price' => '0.0000',
        'start_price' => '0.0000',
        'auction_start' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'notified' => 'boolean',
        'auction_paid' => 'boolean',
        'auction_clock' => 'boolean',
        'auction_start' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'expires_date',
    ];

    /**
    * Get the single record associated with this model.
    */

}
