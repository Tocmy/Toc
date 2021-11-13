<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\StateRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;

class State extends BaseModel
{
    use HasFactory, StateRelationship, SoftDeletes;

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
        'country_id', 'iso_code', 'iso_numeric','calling_code', 'name', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'country_id' => 0,
        'iso_code' => '',
        'iso_numeric' => Null,
        'calling_code' => Null,
        'name' => Null,
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
