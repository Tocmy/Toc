<?php
namespace App\Models\Warranty\Relationship;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Warranty\Warranty;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait WarrantyProductRelationship
{
    /**
     * Get the user that owns the WarrantyProductRelationship
     *
     * @return \
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function warranty(): BelongsTo
    {
        return $this->belongsTo(Warranty::class, 'warranty_id', 'id');
    }


}

?>
