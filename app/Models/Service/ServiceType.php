<?php

namespace App\Models\Service;

use App\Models\Service\Relationship\ServiceTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory, ServiceTypeRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'service_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name',  'image', 'status', 'service_id', 'contract_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'image' => '',
        'status' => false,
        'service_id' => 0,
        'contract_id' => 0,
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
