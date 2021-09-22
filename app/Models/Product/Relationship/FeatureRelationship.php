<?php

namespace App\Models\Product\Relationship;


/**
 *
 */
trait FeatureRelationship
{
      public function product()
      {
          return $this->belongsTo(App\Models\Product::class, 'product_id', 'id');
      }
}


