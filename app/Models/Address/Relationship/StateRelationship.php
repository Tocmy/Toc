<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\Zone;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait StateRelationship
{
     /**
      * Get all of the cities for the StateRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function cities(): HasMany
     {
         return $this->hasMany(City::class, 'state_id', 'id');
     }

    
     public function zones(): HasMany
     {
         return $this->hasMany(Zone::class, 'state_id', 'id');
     }

     /**
      * Get the user that owns the StateRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function country(): BelongsTo
     {
         return $this->belongsTo(Country::class, 'country_id', 'id');
     }
}

