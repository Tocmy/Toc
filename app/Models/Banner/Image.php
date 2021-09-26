<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Banner\Relationship\ImageRelationship;
use Kyslik\ColumnSortable\Sortable;

class Image extends Model
{
    use HasFactory ,SoftDeletes, ImageRelationship, Sortable;

    /**
    * The table associated with the model.
    *alokcart -imageable
    *neon->fileupload,
    * @var  string
    */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'banner_id', 'link', 'image', 'product_id', 'position',
        'params', 'title', 'description', 'custom_code',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'banner_id' => 0,
        'link' => '',
        'image' => '',
        'product_id' => 0,
        'position' => false,
        'params' => '',
        'title' => '',
        'description' => '',
        'custom_code' => '',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'position' => 'boolean',
    ];

    public $sortable = ['position'];


}
