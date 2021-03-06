<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\ZoneRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory, ZoneRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'zones';

    /**
     * The attributes that are mass assignable.
     *locatuin ero44
     * @var  array
     */
    protected $fillable = [
        'name', 'state_id', 'country_id', 'geo_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'country_id' => 0,
        'state_id' => 0,
        'geo_id' => 0,
    ];

}
