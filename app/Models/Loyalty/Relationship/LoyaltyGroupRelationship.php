<?php
namespace App\Models\Loyalty\Relationship;

use App\Models\Customer\CustomerGroup;
use App\Models\Loyalty\LoyaltyRestrict;
use App\Models\Product\Product;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait LoyaltyGroupRelationship
{
    /**
     * Get the user that owns the LoyaltyGroupRelationship
     *
     * @return \
     */
    public function customerGroup(): BelongsTo
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id' );
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }

    /**
     * Get all of the comments for the LoyaltyGroupRelationship
     *
     * @return \
     */
    public function loyaltyRestricts(): HasMany
    {
        return $this->hasMany(LoyaltyRestrict::class, 'loyalty_group_id', 'id');
    }
}

?>
