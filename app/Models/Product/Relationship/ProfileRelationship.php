<?php
namespace App\Models\Product\Relationship;

use App\Models\Order\OrderRecurrence;
use App\Models\Product\ProductProfile;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait ProfileRelationship
{
    /**
     * Get all of the comments for the ProfileRelationship
     *
     * @return \
     */
    public function OrderRecurrences(): HasMany
    {
        return $this->hasMany(OrderRecurrence::class, 'profile_id', 'id');
    }

    public function productProfiles(): HasMany
    {
        return $this->hasMany(ProductProfile::class, 'profile_id', 'id');
    }
}

?>
