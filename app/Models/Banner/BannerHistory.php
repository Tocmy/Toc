<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerHistory extends Model
{
    use HasFactory;

    protected $table = 'banner_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'banner_id', 'show', 'clicked', 'date',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'banner_id' => 0,
        'show' => 0,
        'clicked' => 0,
        'date' => NULL,
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'date',
    ];
}
