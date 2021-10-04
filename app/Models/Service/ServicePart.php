<?php

namespace App\Models\Service;

use App\Models\Service\Relationship\ServicePartRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicePart extends Model
{
    use HasFactory, SoftDeletes,ServicePartRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'service_parts';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'service_id', 'supplier_id', 'model', 'name', 'price', 'discount', 'amount',
        'products_tax', 'quantity', 'part_no', 'availability', 'service_returned', 'replacement_serviced',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'service_id' => 0,
        'supplier_id' => 0,
        'model' => '',
        'name' => '',
        'price' => 0,
        'discount' => 0,
        'amount' => 0,
        'products_tax' => 0,
        'quantity' => 0,
        'part_no' => '',
        'availability' => NULL,
        'service_returned' => false,
        'replacement_serviced' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'availability' => 'boolean',
        'service_returned' => 'boolean',
        'replacement_serviced' => 'boolean',
    ];
}
