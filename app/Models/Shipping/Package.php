<?php

namespace App\Models\Shipping;

use App\Models\Shipping\Relationship\PackageRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes,PackageRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'order_id', 'package_no', 'name', 'description', 'status', 'quotetype',
        'width', 'length', 'height', 'min_weight', 'max_weight', 'cost', 'notify_carrier',
        'on_shipment', 'pickup_date', 'tracking_no',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'order_id' => 0,
        'package_no' => '',
        'name' => '',
        'description' => '',
        'status' => 0,
        'quotetype' => 0,
        'width' => 0,
        'length' => 0,
        'height' => 0,
        'min_weight' => 0,
        'max_weight' => 0,
        'cost' => 0,
        'notify_carrier' => false,
        'on_shipment' => false,
        'pickup_date' => NULL,
        'tracking_no' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'notify_carrier' => 'boolean',
        'on_shipment' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'pickup_date',
    ];

}
