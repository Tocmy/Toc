<?php
namespace App\Models\Product\Relationship;

use App\Models\General\Type;
use App\Models\Product\Combo;
use App\Models\Product\ProductDiscount;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait DiscountRelationship
{
    /**
     * Get all of the comments for the DiscountRelationship
     *
     * @return \
     */
    public function combos(): HasMany
    {
        return $this->hasMany(Combo::class, 'discount_id', 'id');
    }

    public function productDiscount(): HasMany
    {
        return $this->hasMany(ProductDiscount::class, 'discount_id', 'id');
    }

    /**
     * Get the user that owns the DiscountRelationship
     *
     * @return \
     */
    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}

?>
