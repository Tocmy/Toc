<?php

namespace App\Models\Setting\Relationship;

use App\Models\Product\Product;
use App\Models\Purchase\Purchase;
use App\Models\Shipping\ShippingRate;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait LengthRelationship
{
      /**
       * Get all of the comments for the LengthRelationship
       *
       */
      public function products(): HasMany
      {
          return $this->hasMany(Product::class, 'length_id', 'id');
      }
      public function purchase(): HasMany
      {
          return $this->hasMany(Purchase::class, 'length_id', 'id');
      }
      public function shippingRate(): HasMany
      {
          return $this->hasMany(ShippingRate::class, 'length_id', 'id');
      }
}


