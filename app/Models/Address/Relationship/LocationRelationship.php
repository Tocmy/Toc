<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Address;
use App\Models\Address\Location;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait LocationRelationship
{
   /**
    * Get the address that owns the LocationRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function address(): BelongsTo
   {
       return $this->belongsTo(Address::class, 'address_id', 'id');
   }


   public function parent(): BelongsTo
   {
       return $this->belongsTo(Location::class, 'parent_id', 'id');
   }
   /**
    * Get all of the comments for the LocationRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function parentLocations(): HasMany
   {
       return $this->hasMany(Location::class, 'parent_id', 'id');
   }
}

