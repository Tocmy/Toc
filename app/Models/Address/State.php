<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\StateRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory, StateRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'country_id', 'code', 'name', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'country_id' => 0,
        'code' => '',
        'name' => '',
        'status' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];

}
