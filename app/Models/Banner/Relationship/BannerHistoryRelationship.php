<?php
namespace App\Models\Banner\Relationship;

use App\Models\Banner\Banner;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait BannerHistoryRelationship
{
    /**
     * Get the user that owns the BannerHistoryRelationship
     *
     * @return \
     */
    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class, 'banner_id', 'id');
    }
}

