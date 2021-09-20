<?php
namespace App\Models\Article;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleDescriptionExtra extends Model
{
    use HasFactory,SoftDeletes;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'article_description_extras';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'article_id', 'extra_description',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'article_id' => 0,
        'extra_description' => '',
    ];
}
