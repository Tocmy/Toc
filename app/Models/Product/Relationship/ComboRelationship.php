<?php
namespace App\Models\Product\Relationship;

use App\Models\Category\Category;
use App\Models\Product\Discount;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait ComboRelationship
{
    /**
     * Get the user that owns the ComboRelationship
     *
     * @return \
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'discount_id', 'id');
    }

    public function subproduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'subproduct_id', 'id');
    }


}

?>
