<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Product\Product;

/**
 *
 */
trait PromotionRelationship
{

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}


?>
