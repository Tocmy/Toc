<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Company\Company;
use App\Models\Marketing\CouponHistory;
use App\Models\Marketing\CouponRedeem;
use App\Models\Marketing\CouponTrack;
use App\Models\Marketing\Restrict;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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

   public function couponTracks(): HasMany
   {
       return $this->hasMany(CouponTrack::class, 'coupon_id', 'id');
   }

   /**
    * Get the user that owns the CouponRelationship
    *
    */
   public function setting(): BelongsTo
   {
       return $this->belongsTo(Setting::class, 'setting_id', 'id');
   }


   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }



}


