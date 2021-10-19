<?php

namespace App\Models\Warranty;

use App\Models\Warranty\Relationship\WarrantyOrderRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarrantyOrder extends Model
{
    use HasFactory, SoftDeletes, WarrantyOrderRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'warranty_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'order_id', 'upc', 'warranty_serial', 'status', 'check_warranty', 'is_ship', 'ship_date',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'order_id' => 0,
        'upc' => '',
        'warranty_serial' => '',
        'status' => false,
        'check_warranty' => false,
        'is_ship' => false,
        'ship_date' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'check_warranty' => 'boolean',
        'is_ship' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'ship_date',
    ];

}
