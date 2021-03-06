<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomField extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'order_custom_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'value', 'position', 'order_id', 'custom_field_id', 'custom_field_value_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => 0,
        'value' => '',
        'position' => 0,
        'order_id' => 0,
        'custom_field_id' => 0,
        'custom_field_value_id' => 0,
    ];
}
