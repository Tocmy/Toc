<?php

namespace App\Models\Warranty;

use App\Models\Warranty\Relationship\WarrantyProductRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class WarrantyProduct extends BaseModel
{
    use HasFactory, WarrantyProductRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'warranty_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_name', 'product_model', 'product_price', 'product_cost', 'products_image', 'product_status', 'product_series_no', 'cost', 'year',
         'charge', 'date_start', 'expire_at', 'category_id', 'warranty_id', 'product_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'product_name' => '',
        'product_model' => '',
        'product_price' => 0,
        'product_cost' => 0,
        'products_image' => '',
        'product_status' => false,
        'product_series_no' => '',
        'cost' => 0,
        'year' => 0,
        'charge' => '',
        'category_id' => 0,
        'warranty_id' => 0,
        'product_id' => 0,

    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'product_status' => 'boolean',
    ];

    protected $dates = [
        'date_start', 'expire_at',
    ];

}
