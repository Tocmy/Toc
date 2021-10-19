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
        'name', 'open', 'comment', 'image', 'parent_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'open' => '',
        'comment' => '',
        'image' => NULL,
        'parent_id' => NULL,
    ];

}
