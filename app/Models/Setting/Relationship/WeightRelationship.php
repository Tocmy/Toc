<?php
namespace App\Models\Setting\Relationship;

use App\Models\Product\Product;
use App\Models\Purchase\Purchase;
use App\Models\Shipping\ShippingRate;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 *
 */
trait WeightRelationship
{
   /**
    * Get all of the comments for the WeightRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function products(): HasMany
   {
       return $this->hasMany(Product::class, 'weight_id', 'id');
   }

   public function purchase(): HasMany
   {
       return $this->hasMany(Purchase::class, 'weight_id', 'id');
   }
   public function shippingRate(): HasMany
   {
       return $this->hasMany(ShippingRate::class, 'weight_id', 'id');
   }
}

?>
