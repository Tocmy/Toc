<?php

namespace App\Models\Banner;

use App\Models\Banner\Relationship\BannerRelationship;
use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes, BannerRelationship,Imageable;

    protected $table = 'banners';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'status', 'main_width', 'main_hight', 'scheduled', 'expired', 'banner_group_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'status' => false,
        'main_width' => 0,
        'main_hight' => 0,
        'scheduled' => NULL,
        'expired' => NULL,
        'banner_group_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'scheduled', 'expired',
    ];


}
