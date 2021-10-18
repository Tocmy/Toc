<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\PromotionRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory,PromotionRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'promotions';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'status', 'position', 'code', 'name', 'slug', 'description', 'image', 'reward', 'is_used', 'date_start', 'expire_at', 'product_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'status' => false,
        'position' => 0,
        'code' => '',
        'name' => '',
        'slug' => '',
        'description' => '',
        'image' => '',
        'reward' => NULL,
        'is_used' => false,
        'date_start' => NULL,
        'expire_at' => NULL,
        'product_id' => 0,
    ];


    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'is_used' => 'boolean',
    ];

    protected $dates = [
        'date_start', 'expire_at',
    ];

}
