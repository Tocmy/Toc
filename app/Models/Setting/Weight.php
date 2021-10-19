<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\WeightRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends Model
{
    use HasFactory, SoftDeletes, WeightRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weights';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'value', 'title', 'unit', 'is_default',
    ];

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
