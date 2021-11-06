<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'amount', 'min_range', 'max_range', 'percentage', 'status', 'type_id', 'setting_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'amount' => 0,
        'min_range' => 0,
        'max_range' => 0,
        'percentage' => 0,
        'status' => NULL,
        'type_id' => 0,
        'setting_id' => 0,
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

}
