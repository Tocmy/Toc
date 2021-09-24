<?php

namespace App\Models\Banner;

use App\Models\Banner\Relationship\BannerGroupRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BannerGroup extends Model
{
    use HasFactory, BannerGroupRelationship, Sortable;
    /**
    * The table associated with the model.
    * 1.advertiment 2.banner 3.carosel
    * @var  string
    */
    protected $table = 'banner_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'position', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'position' => 0,
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

    public $sortable = ['position'];

}
