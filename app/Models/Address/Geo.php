<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\GeoRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Geo extends Model
{
    use HasFactory, SoftDeletes, GeoRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'geos';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'description',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'description' => '',
    ];

}
