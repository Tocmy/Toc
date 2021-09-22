<?php

namespace App\Models\Product;

use App\Models\Product\Relationship\BidRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bid extends Model
{
    use HasFactory, SoftDeletes,BidRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'bids';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'auction_id', 'customer_id', 'bid_price', 'bid_status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'auction_id' => 0,
        'customer_id' => 0,
        'bid_price' => '0.0000',
        'bid_status' => '',
    ];

}
