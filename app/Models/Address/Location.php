<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\LocationRelationship;
use App\Traits\Addressable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nestable\NestableTrait;

class Location extends Model
{
    use HasFactory, SoftDeletes, LocationRelationship, NestableTrait, Addressable;
    /**
    * The table associated with the model.
    *
    * @var  string
    */

    protected $table = 'locations';
    protected $parent = 'parent_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'parent_id', 'name', 'address_id', 'open', 'comment', 'image',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'parent_id' => NULL,
        'lft' => NULL,
        'rgt' => NULL,
        'depth' => NULL,
        'name' => '',
        'address_id' => 0,
        'open' => '',
        'comment' => '',
        'image' => NULL,
    ];

}
