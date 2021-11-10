<?php

namespace App\Models\Brand\Relationship;

use App\Models\Company\Company;
use App\Models\Product\Product;
use App\Models\Purchase\Purchase;
use App\Models\Service\Service;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 *
 */
trait BrandRelationship
{
      /**
       * Get the user that owns the BrandRelationship
       *
       * @return \
       */
      public function store(): BelongsTo
      {
          return $this->belongsTo(Company::class, 'store_id', 'id');
      }

      /**
       * Get all of the comments for the BrandRelationship
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function products(): HasMany
      {
          return $this->hasMany(Product::class, 'brand_id', 'id');
      }

      public function purchases(): HasMany
      {
          return $this->hasMany(Purchase::class, 'brand_id', 'id');
      }

      public function services(): HasMany
      {
          return $this->hasMany(Service::class, 'brand_id', 'id');
      }


}

