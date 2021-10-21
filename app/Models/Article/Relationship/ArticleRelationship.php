<?php
namespace App\Models\Article\Relationship;

use App\Models\Article\ArticleRelated;
use App\Models\Article\Comment;
use App\Models\Company\Company;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait ArticleRelationship
{
   /**
    * Get all of the comments for the ArticleRelationship
    *
    */
   public function articleRelateds(): HasMany
   {
       return $this->hasMany(ArticleRelated::class, 'article_id', 'id');
   }

   public function relatedArticles(): HasMany
   {
       return $this->hasMany(ArticleRelated::class, 'related_id', 'id');
   }

   public function topic(): HasMany
   {
       return $this->hasMany(ArticleTopic::class, 'article_id', 'id');
   }

   public function comments(): HasMany
   {
       return $this->hasMany(Comment::class, 'article_id', 'id');
   }


   /**
    * Get the user that owns the ArticleRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function author(): BelongsTo
   {
       return $this->belongsTo(User::class, 'author_id', 'id');
   }

   public function extra(): BelongsTo
   {
       return $this->belongsTo(ArticleDescriptionExtra::class, 'extra_id', 'id');
   }

   public function product(): BelongsTo
   {
       return $this->belongsTo(Product::class, 'product_id', 'id');
   }

   public function company(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }

}

?>
