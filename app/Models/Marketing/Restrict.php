<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\RestrictRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restrict extends Model
{
    use HasFactory, RestrictRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'restricts';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'setting_id', 'customer_group_id', 'category_id', 'product_id', 'name', 'description','zone_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'setting_id' => 0,
        'customer_group_id' => '0',
        'category_id' => '0',
        'product_id' => '0',
        'name' => '',
        'description' => '',
    ];


}
