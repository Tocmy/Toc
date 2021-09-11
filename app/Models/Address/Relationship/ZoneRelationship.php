<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Country;
use App\Models\Address\Geo;
use App\Models\Address\State;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait ZoneRelationship
{
     /**
      * Get the geo that owns the ZoneRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function geo(): BelongsTo
     {
         return $this->belongsTo(Geo::class, 'geo_id', 'id');
     }

     /**
      * Get the user that owns the ZoneRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function state(): BelongsTo
     {
         return $this->belongsTo(State::class, 'state_id', 'id');
     }

     /**
      * Get the country that owns the ZoneRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function country(): BelongsTo
     {
         return $this->belongsTo(Country::class, 'country_id', 'id');
     }
}

