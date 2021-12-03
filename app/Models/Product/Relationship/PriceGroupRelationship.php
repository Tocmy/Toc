<?php
namespace App\Models\Product\Relationship;

use App\Models\Product\Product;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait PriceGroupRelationship
{
    /**
     * Get the user that owns the PriceGroupRelationship
     *
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }


}

?>
