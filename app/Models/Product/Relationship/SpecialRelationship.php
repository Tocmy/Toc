<?php
namespace App\Models\Product\Relationship;

use App\Models\Customer\CustomerGroup;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 *
 */
trait SpecialRelationship
{
      /**
       * Get the user that owns the SpecialRelationship
       *
       */
      public function customerGroup(): BelongsTo
      {
          return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
      }

      public function product(): BelongsTo
      {
          return $this->belongsTo(Product::class, 'product_id', 'id');
      }
}

?>
