<?php
namespace App\Models\Affiliate\Relationship;

/**
 *
 */
trait AffiliateClickRelationship
{
   /**
    * Get the banner that owns the AffiliateClickRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function banner()
   {
       return $this->belongsTo(App\Models\Banner\Banner::class, 'banner_id', 'id');
   }

   public function product()
   {
       return $this->belongsTo(App\Models\Product\Product::class, 'product_id', 'id&');
   }

   
   public function affiliate()
   {
       return $this->belongsTo(App\Models\Affiliate\Affiliate::class, 'affiliate_id', 'id');
   }

}

