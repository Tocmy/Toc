<?php

namespace App\Models\Quotation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProduct extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'quotation_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_id',
        'quote_id',
        'quantity',
        'price',
        'subtotal',
        'description',
        'base_price',
        'total_price',
        'total_qty',
        'total_discount',
        'total_tax',
        'tax_rate',
        'tax',
        'discount',
        'shipping_cost',
        'grand_total',
    ];

    /**
    * The model's attributes.
    *ref ivd prefix
    * client management using laravel
    * @var  array
    */
    protected $attributes = [
        'product_id' => 0,
        'quote_id' => 0,
        'quantity' => 0,
        'price' => '0.0000',
        'subtotal' => '0.0000',
        'description' => '',
        'base_price' => 0,
    ];

}
