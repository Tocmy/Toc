<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\CurrencyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory, SoftDeletes, CurrencyRelationship;
    /**
    * The table associated with the model.
    *ecom-backend/property valuation
    * @var  string
    */
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title', 'symbol_left', 'symbol_right', 'code', 'decimal_place', 'value', 'decimal_point', 'thousand_point', 'status','is_default',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'title' => '',
        'symbol_left' => '',
        'symbol_right' => '',
        'code' => '',
        'decimal_place' => '',
        'value' => 0,
        'decimal_point' => '',
        'thousand_point' => '',
        'status' => true,
        'is_default' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'is_default' => 'boolean',
    ];
}
