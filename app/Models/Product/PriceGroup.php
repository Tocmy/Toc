<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceGroup extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'price_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'percentage', 'min_quantity', 'max_quantity', 'price', 'product_id', 'setting_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'percentage' => 0,
        'min_quantity' => 0,
        'max_quantity' => 0,
        'price' => 0,
        'product_id' => 0,
        'setting_id' => 0,
    ];

}
