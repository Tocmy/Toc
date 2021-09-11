<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Zone;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait GeoRelationship
{
      /**
       * Get all of the zones for the GeoRelationship
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function zones(): HasMany
      {
          return $this->hasMany(Zone::class, 'geo_id', 'id');
      }
}

