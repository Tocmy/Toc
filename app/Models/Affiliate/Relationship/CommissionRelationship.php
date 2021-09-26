<?php
namespace App\Models\Affiliate\Relationship;

use App\Models\Affiliate\Affiliate;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait CommissionRelationship
{
    /**
     * Get all of the comments for the CommissionRelationship
     *
     * @return \
     */
    public function affiliates(): HasMany
    {
        return $this->hasMany(Affiliate::class, 'commission_id', 'id');
    }
}


?>
