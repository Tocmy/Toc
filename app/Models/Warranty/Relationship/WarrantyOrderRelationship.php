<?php
namespace App\Models\Warranty\Relationship;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait WarrantyOrderRelationship
{
      /**
       * Get the user that owns the WarrantyOrderRelationship
       *
       * @return \
       */
      public function order(): BelongsTo
      {
          return $this->belongsTo(Order::class, 'order_id', 'id');
      }
}

?>
