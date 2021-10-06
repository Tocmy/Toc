<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxRate extends Model
{
    use HasFactory, SoftDeletes;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'tax_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'geo_id', 'name', 'rate', 'type', 'customer_group_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'geo_id' => 0,
        'name' => '',
        'rate' => '0.0000',
        'type' => false,
        'customer_group_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'type' => 'boolean',
    ];

}
