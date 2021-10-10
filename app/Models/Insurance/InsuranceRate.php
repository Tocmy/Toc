<?php

namespace App\Models\Insurance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceRate extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'insurance_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'fee', 'geo_id', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'fee' => 0,
        'geo_id' => 0,
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
