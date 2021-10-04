<?php

namespace App\Models\Service;

use App\Models\Service\Relationship\ServiceRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Service extends Model
{
    use HasFactory, SoftDeletes, ServiceRelationship;
    /**
    * The table associated with the model.
    * mainly for repairing service ie laptop,handset, network, other
    * ticketing
    * @var  string
    */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'service_no',
        'description',
        'problem',
        'solution',
        'product',
        'model',
        'image',
        'serial_no',
        'quantity',
        'warranty_check', 'service_price', 'estimate_price', 'min_charge', 'part_cost', 'other_charge', 'status', 'is_free', 'quote', 'comment',
        'accessory', 'service_warranty', 'date_order', 'date_finish', 'contact_person', 'product_id', 'customer_id', 'address_id', 'brand_id', 'tax_rate_id',
        'status_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'service_no' => 0,
        'description' => '',
        'problem' => '',
        'solution' => '',
        'product' => '',
        'model' => '',
        'image' => '',
        'serial_no' => '',
        'quantity' => 0,
        'warranty_check' => false,
        'service_price' => '0.0000',
        'estimate_price' => '0.0000',
        'min_charge' => '0.0000',
        'part_cost' => '0.0000',
        'other_charge' => '0.0000',
        'status' => false,
        'is_free' => false,
        'quote' => false,
        'comment' => '',
        'accessory' => '',
        'service_warranty' => false,
        'date_order' => NULL,
        'date_finish' => NULL,
        'contact_person' => '',
        'product_id' => 0,
        'customer_id' => 0,
        'address_id' => 0,
        'brand_id' => 0,
        'tax_rate_id' => 0,
        'status_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'warranty_check' => 'boolean',
        'status' => 'boolean',
        'is_free' => 'boolean',
        'quote' => 'boolean',
        'service_warranty' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'date_order', 'date_finish',
    ];


}
