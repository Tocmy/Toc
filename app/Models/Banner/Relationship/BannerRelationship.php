<?php
namespace App\Models\Banner\Relationship;

use App\Models\Banner\BannerGroup;
use App\Models\Banner\BannerHistory;
use App\Models\Banner\Image;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
  public function bannerHistories(): HasMany
  {
      return $this->hasMany(BannerHistory::class, 'banner_id', 'id');
  }

  public function images(): HasMany
  {
      return $this->hasMany(Image::class, 'banner_id', 'id');
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

