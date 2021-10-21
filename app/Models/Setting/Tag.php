<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\TagRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, TagRelationship;

    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'slug', 'name', 'taggable_type', 'taggable_id', 'position', 'suggest', 'count', 'tag_group_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'slug' => '',
        'name' => '',
        'taggable_type' => '',
        'taggable_id' => 0,
        'position' => NULL,
        'suggest' => false,
        'count' => NULL,
        'tag_group_id' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'suggest' => 'boolean',
    ];
}
