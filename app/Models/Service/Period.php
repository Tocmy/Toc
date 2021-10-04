<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'periods';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'group', 'name', 'interval', 'interval_count', 'interval_cycle', 'interval_duration',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'group' => NULL,
        'name' => '',
        'interval' => '',
        'interval_count' => 0,
        'interval_cycle' => false,
        'interval_duration' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'interval_cycle' => 'boolean',
        'interval_duration' => 'boolean',
    ];

    
}
