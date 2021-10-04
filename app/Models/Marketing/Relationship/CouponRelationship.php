<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Marketing\CouponHistory;
use App\Models\Marketing\CouponRedeem;
use App\Models\Marketing\Restrict;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait CouponRelationship
{
   /**
    * The roles that belong to the CouponRelationship
    *
    * @return \
    */
   public function restricts(): BelongsToMany
   {
       return $this->belongsToMany(Restrict::class, 'coupon_restrict', 'coupon_id', 'restrict_id')
                   ->withTimestamps()
                   ->withPivot('is_restrict', 'exclude');
   }

   /**
    * Get all of the comments for the CouponRelationship
    *
    * @return \
    */
   public function couponHistories(): HasMany
   {
       return $this->hasMany(CouponHistory::class, 'coupon_id', 'id');
   }

   public function couponRedeems(): HasMany
   {
       return $this->hasMany(CouponRedeem::class, 'coupon_id', 'id');
   }

   


}


