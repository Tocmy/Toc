<?php

namespace App\Models\Company\Relationship;

use App\Models\Article\Article;
use App\Models\Product\Auction;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait CompanyRelationship
{
   /**
    * Get all of the comments for the CompanyRelationship
    *
    * @return \
    */
   public function storeArticles(): HasMany
   {
       return $this->hasMany(Article::class, 'store_id', 'id');
   }

   public function storeAuctions(): HasMany
   {
       return $this->hasMany(Auction::class, 'store_id', 'id');
   }

}




