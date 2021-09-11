<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Country;
use App\Models\Address\State;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait AddressRelationship
{
     public function addressable()
     {
         return $this->morphTo();
     }

     /**
      * Get the country that owns the AddressRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function country(): BelongsTo
     {
         return $this->belongsTo(Country::class, 'country_id', 'id');
     }

     public function state()
     {
         return $this->hasOneThrough(Country::class, State::class);
     }
}

