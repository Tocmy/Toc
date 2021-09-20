<?php
namespace App\Models\Article\Relationship;

use App\Models\Article;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait ArticleRelatedRelationship
{
   /**
    * Get the user that owns the ArticleRelatedRelationship
    *
    * @return \
    */
   public function article(): BelongsTo
   {
       return $this->belongsTo(Article::class, 'article_id', 'id');
   }

   public function related(): BelongsTo
   {
       return $this->belongsTo(Article::class, 'related_id', 'id');
   }
}


?>
