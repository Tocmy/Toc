<?php
namespace App\Models\Shipping\Relationship;

use App\Models\Shipping\ShippingRate;
use App\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

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

      /**
       * Get all of the comments for the CarrierRelationship
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function shippingRates(): HasMany
      {
          return $this->hasMany(ShippingRate::class, 'carrier_id', 'id');
      }
}


?>
