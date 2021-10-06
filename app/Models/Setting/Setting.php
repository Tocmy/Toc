<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Setting\Relationship\SettingRelationship;

class Setting extends Model
{
    use HasFactory, softDeletes, SettingRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'setting_group_id', 'key', 'name', 'description', 'value', 'field', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'setting_group_id' => 0,
        'key' => '',
        'name' => '',
        'description' => NULL,
        'value' => NULL,
        'field' => '',
        'status' => NULL,
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
