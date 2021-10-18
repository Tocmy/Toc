<?php

namespace App\Models\Product;

use App\Models\Product\Relationship\SpecialRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Special extends Model
{
    use HasFactory,SoftDeletes,SpecialRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'specials';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'price', 'expire_at', 'begin_at', 'status', 'customer_group_id', 'product_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'price' => '0.0000',
        'expire_at' => NULL,
        'begin_at' => NULL,
        'status' => false,
        'customer_group_id' => 0,
        'product_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'expire_at', 'begin_at',
    ];



}
