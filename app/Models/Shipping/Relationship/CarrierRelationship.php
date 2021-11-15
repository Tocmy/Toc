<?php
namespace App\Models\Shipping\Relationship;

use App\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait CarrierRelationship
{
      /**
       * Get the user that owns the CarrierRelationship
       *
       * @return \
       */
      public function supplier(): BelongsTo
      {
          return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
      }
}


?>
