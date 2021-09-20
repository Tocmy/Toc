<?php

namespace App\Models\Article;

use App\Models\Article\Relationship\ArticleRelatedRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleRelated extends Model
{
    use HasFactory, ArticleRelatedRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'article_relateds';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'article_id', 'related_id', 'position', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'article_id' => 0,
        'related_id' => 0,
        'position' => 0,
        'status' => false,
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
}
