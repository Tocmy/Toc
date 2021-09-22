<?php

namespace App\Models\Product;

use App\Models\Product\Relationship\ProductRelatedRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRelated extends Model
{
    use HasFactory, ProductRelatedRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'product_relateds';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_id', 'related_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'product_id' => 0,
        'related_id' => 0,
    ];
}
