<?php

namespace App\Models\Purchase;

use App\Models\Purchase\Relationship\PurchaseRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes, PurchaseRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'purchases';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'brand_id', 'supplier_id', 'tax_id', 'product_id', 'po_number', 'name', 'model', 'image', 'price', 'price_per_piece', 'ship_cost', 'total_cost', 'avg_cost', 'unit', 'colour', 'size', 'quantity', 'length', 'width', 'height', 'weight', 'status', 'length_id', 'weight_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'brand_id' => 0,
        'supplier_id' => 0,
        'tax_id' => 0,
        'product_id' => 0,
        'po_number' => '',
        'name' => '',
        'model' => '',
        'image' => '',
        'price' => '0.0000',
        'price_per_piece' => '0.0000',
        'ship_cost' => '0.0000',
        'total_cost' => '0.0000',
        'avg_cost' => '0.0000',
        'unit' => 0,
        'colour' => '',
        'size' => '',
        'quantity' => 0,
        'length' => '0.00000000',
        'width' => '0.00000000',
        'height' => '0.00000000',
        'weight' => '0.00000000',
        'status' => NULL,
        'length_id' => 0,
        'weight_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];

}
