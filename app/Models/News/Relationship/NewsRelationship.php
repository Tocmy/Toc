<?php
namespace App\Models\News\Relationship;

use App\Models\Affiliate\Affiliate;
use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait NewsRelationship
{
   /**
    * The roles that belong to the NewsRelationship
    *
    * @return \
    */
   public function affiliates(): BelongsToMany
   {
       return $this->belongsToMany(Affiliate::class, 'affiliate_news', 'news_id', 'affiliate_id')->withTimestamps();
   }

   /**
    * Get the user that owns the NewsRelationship
    *
    * @return
    */
   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }
}

?>
