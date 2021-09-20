<?php

namespace App\Models\Article;

use App\Models\Article\Relationship\CommentRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes,CommentRelationship;

    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'commentable_type', 'commentable_id', 'customer_id', 'article_id', 'reply_id', 'author_id', 'comments', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'commentable_type' => '',
        'commentable_id' => 0,
        'customer_id' => 0,
        'article_id' => 0,
        'reply_id' => 0,
        'author_id' => 0,
        'comments' => '',
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

    public function commentable()
    {
        return $this->morphTo();
    }

}
