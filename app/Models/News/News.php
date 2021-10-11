<?php

namespace App\Models\News;

use App\Models\News\Relationship\NewsRelationship;
use App\Traits\Seoable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, NewsRelationship, SoftDeletes, Seoable;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'image', 'published_at', 'viewed', 'status',
         'title', 'slug', 'description', 'tag_id', 'meta_id', 'store_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'image' => '',
        'published_at' => NULL,
        'viewed' => false,
        'status' => false,
        'title' => '',
        'slug' => '',
        'description' => '',
        'tag_id' => 0,
        'meta_id' => 0,
        'store_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'viewed' => 'boolean',
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'published_at',
    ];

}
