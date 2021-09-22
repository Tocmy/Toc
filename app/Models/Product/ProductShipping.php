<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShipping extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'product_shippings';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_id', 'method_id', 'zipcode', 'price', 'price_2',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'product_id' => 0,
        'method_id' => 0,
        'zipcode' => '',
        'price' => '0.0000',
        'price_2' => '0.0000',
    ];

}
