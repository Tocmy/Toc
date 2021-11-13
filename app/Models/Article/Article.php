<?php
namespace App\Models\Article;


use App\Models\Article\Relationship\ArticleRelationship;
use App\Traits\Seoable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Article extends Model
{
    use HasFactory, SoftDeletes,  ArticleRelationship, Seoable,Sortable;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'articles';
    protected $sortable =['position'];

    /**
     * The attributes that are mass assignable.
     *tagging
     * @var  array
     */
    protected $fillable = [
        'is_blog', 'allow_comment', 'image', 'article_related_method', 'article_related_option',
         'position', 'status', 'published_date', 'title', 'slug', 'description', 'author_id', 'product_id', 'store_id', 'extra_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
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
        'author_id' => 0,
        'product_id' => 0,
        'store_id' => 0,
        'extra_id' => 0,
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
