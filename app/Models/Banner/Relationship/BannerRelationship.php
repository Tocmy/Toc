<?php
namespace App\Models\Banner\Relationship;

use App\Models\Affiliate\AffiliateBanner;
use App\Models\Affiliate\AffiliateClick;
use App\Models\Banner\BannerGroup;
use App\Models\Banner\BannerHistory;
use Illuminate\Database\Eloquent\Relations\{HasMany,BelongsTo};


/**
 *
 */
trait BannerRelationship
{
  /**
   * Get all of the comments for the BannerRelationship
   *
   * @return \
   */
  public function affiliateBanners(): HasMany
  {
      return $this->hasMany(AffiliateBanner::class, 'banner_id', 'id');
  }

  public function affiliateClicks(): HasMany
  {
      return $this->hasMany(AffiliateClick::class, 'banner_id', 'id');
  }

  public function bannerHistories(): HasMany
  {
      return $this->hasMany(BannerHistory::class, 'banner_id', 'id');
  }



  /**
   * Get the user that owns the BannerRelationship
   *
   * @return \
   */
  public function bannerGroup(): BelongsTo
  {
      return $this->belongsTo(BannerGroup::class, 'banner_group-id', 'id');
  }
}

