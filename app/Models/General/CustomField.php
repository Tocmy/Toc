<?php

namespace App\Models\General;

use App\Models\General\Relationship\CustomFieldRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use HasFactory, CustomFieldRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'custom_fields';

    /**
     * The attributes that are mass assignable.
     *l8\crm
     * @var  array
     */
    protected $fillable = [
        'type', 'value', 'required', 'location',
        'position', 'status', 'name', 'customer_group_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'type' => '',
        'value' => '',
        'required' => false,
        'location' => '',
        'position' => 0,
        'status' => false,
        'name' => '',
        'customer_group_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'required' => 'boolean',
        'status' => 'boolean',
    ];




}
