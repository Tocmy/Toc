<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Country;
use App\Models\Address\State;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

     public function state(): BelongsTo
     {
         return $this->belongsTo(State::class, 'state_id', 'id');
     }

     public function cities(): HasManyThrough
     {
         return $this->hasManyThrough(State::class, City::class);
     }
}

