<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\Relationship\LengthRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Length extends Model
{
    use HasFactory, LengthRelationship, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lengths';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'value', 'title', 'unit', 'is_default',
    ];
     /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'value' => '0.00000000',
        'title' => '',
        'unit' => '',
        'is_default' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'is_default' => 'boolean',
    ];

}
