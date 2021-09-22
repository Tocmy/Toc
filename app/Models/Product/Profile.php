<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'position', 'status', 'price', 'frequency', 'duration', 'cycle', 'trial_status', 'trial_price', 'trial_frequency', 'trial_duration',
        'trial_cycle', 'name',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'position' => 0,
        'status' => NULL,
        'price' => 0,
        'frequency' => '',
        'duration' => 0,
        'cycle' => 0,
        'trial_status' => false,
        'trial_price' => 0,
        'trial_frequency' => '',
        'trial_duration' => 0,
        'trial_cycle' => 0,
        'name' => '',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'trial_status' => 'boolean',
    ];

}
