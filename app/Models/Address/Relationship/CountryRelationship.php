<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Address;
use App\Models\Address\State;
use App\Models\Address\Zone;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait CountryRelationship
{
     /**
      * Get all of the addresses for the CountryRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function addresses(): HasMany
     {
         return $this->hasMany(Address::class, 'country_id', 'id');
     }


     public function states(): HasMany
     {
         return $this->hasMany(State::class, 'country_id', 'id');
     }

     public function zones(): HasMany
     {
         return $this->hasMany(Zone::class, 'country_id', 'id');
     }

}

