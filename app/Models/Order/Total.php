<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Total extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'totals';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'type', 'code', 'class', 'title', 'text', 'name', 'totalable_type', 'totalable_id', 'value', 'position', 'include', 'available',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'type' => '',
        'code' => '',
        'class' => '',
        'title' => '',
        'text' => '',
        'name' => '',
        'totalable_type' => NULL,
        'totalable_id' => NULL,
        'value' => '0.0000',
        'position' => NULL,
        'include' => false,
        'available' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'include' => 'boolean',
        'available' => 'boolean',
    ];


}
