<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'deleted_at', 'model', 'image', 'price', 'cost', 'msrp', 'quote', 'age_minimum', 'date_available', 'position', 'status', 'quantity', 'minimum', 'subtract',
        'shipping', 'sku', 'upc', 'ean', 'jan', 'isbn', 'mpn', 'length', 'width', 'height',
        'length_id', 'weight',
        'weight_id',
        'brand_id', 'tax_id',
        'status_id', 'viewed',
        'bar_code', 'summary', 'name', 'description', 'title',
        'tag_id',
        'meta_id', 'slug'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
