<?php
namespace App\Models\Article;


use App\Models\Article\Relationship\ArticleRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use HasFactory, SoftDeletes,  ArticleRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'author_id', 'is_blog', 'allow_comment', 'image', 'article_related_method', 'article_related_option',
        'position', 'status', 'published_date', 'title', 'slug', 'description', 'tag_id', 'meta_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'author_id' => 0,
        'is_blog' => false,
        'allow_comment' => false,
        'image' => '',
        'article_related_method' => '',
        'article_related_option' => '',
        'position' => 0,
        'status' => false,
        'published_date' => NULL,
        'title' => '',
        'slug' => '',
        'description' => '',
        'tag_id' => 0,
        'meta_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'is_blog' => 'boolean',
        'allow_comment' => 'boolean',
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'published_date',
    ];

    
}
