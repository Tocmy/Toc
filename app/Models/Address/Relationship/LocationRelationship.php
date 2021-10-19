<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Address;
use App\Models\Address\Location;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


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

   /**
    * The roles that belong to the LocationRelationship
    *
    */
   public function products(): BelongsToMany
   {
       return $this->belongsToMany(Product::class, 'product_location', 'location_id', 'product_id');
   }
}

