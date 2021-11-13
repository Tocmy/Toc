<?php

namespace App\Models\Product;

use App\Traits\Imageable;
use App\Traits\Seoable;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes, Imageable, Seoable, Taggable;

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

    public function barcodeTypes()
    {
        $types = [
            'C128' => 'Code 128 (C128)', 'C39' => 'Code 39 (C39)', 'EAN13' => 'EAN-13', 'EAN8' => 'EAN-8', 'UPCA' => 'UPC-A', 'UPCE' => 'UPC-E'
        ];
        return $types;
    }

    public function barcodeDefault()
    {
        return 'C128';
    }

}
