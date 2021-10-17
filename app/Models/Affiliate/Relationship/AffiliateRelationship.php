<?php
namespace App\Models\Affiliate\Relationship;

use App\Models\Address\Address;
use App\Models\Affiliate\AffiliateBanner;
use App\Models\Affiliate\AffiliateBannerHistory;
use App\Models\Affiliate\AffiliateClick;
use App\Models\Affiliate\AffiliatePayment;
use App\Models\Affiliate\AffiliateSale;
use App\Models\Affiliate\Commission;
use App\Models\Marketing\Newsletter;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Omnipay\Common\PaymentMethod;

/**
 *
 */
trait AffiliateRelationship
{
   /**
    * Get all of the comments for the AffiliateRelationship
    *
    * @return \
    */
   public function affiliateBannerHistories(): HasMany
   {
       return $this->hasMany(AffiliateBannerHistory::class, 'affiliate_id', 'id');
   }

   public function affiliateBanners(): HasMany
   {
       return $this->hasMany(AffiliateBanner::class, 'affiliate_id', 'id');
   }

   public function affiliateClicks(): HasMany
   {
       return $this->hasMany(AffiliateClick::class, 'affiliate_id', 'id');
   }
   public function affiliatePayments(): HasMany
   {
       return $this->hasMany(AffiliatePayment::class, 'affiliate_id', 'id');
   }
   public function affiliateSales(): HasMany
   {
       return $this->hasMany(AffiliateSale::class, 'affiliate_id', 'id');
   }

   /**
    * Get the user that owns the AffiliateRelationship
    *
    * @return \
    */


   public function commission(): BelongsTo
   {
       return $this->belongsTo(Commission::class, 'commission_id', 'id');
   }

   public function newsletter(): BelongsTo
    {
        return $this->belongsTo(Newsletter::class, 'newsletter_id', 'id');
    }

    

   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'user_id', 'id');
   }

}




