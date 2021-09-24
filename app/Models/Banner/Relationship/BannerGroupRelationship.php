<?php
namespace App\Models\Banner\Relationship;

use App\Models\Banner\Banner;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait BannerGroupRelationship
{
   /**
    * Get all of the comments for the BannerGroupRelationship
    *
    * @return \
    */
   public function banners(): HasMany
   {
       return $this->hasMany(Banner::class, 'banner_id', 'id');
   }
}

