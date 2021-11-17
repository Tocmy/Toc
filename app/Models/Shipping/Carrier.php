<?php

namespace App\Models\Shipping;

use App\Models\Shipping\Relationship\CarrierRelationship;
use App\Traits\Addressable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrier extends Model
{
    use HasFactory, SoftDeletes, CarrierRelationship, Addressable;

    /**
     * Shipping Provider.-
     * ->shipping (method)->shipping rate
     */

     /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'carriers';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'code', 'name', 'default', 'tracking_link', 'description', 'label_config', 'supplier_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'code' => '',
        'name' => '',
        'default' => 0,
        'tracking_link' => '',
        'description' => '',
        'label_config' => '',
        'supplier_id' => 0,
    ];


}
