<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Customer\Customer;
use App\Models\Marketing\Rating;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait ReviewRelationship
{
   /**
    * Get all of the comments for the ReviewRelationship
    *
    * @return \
    */
   public function ratings(): HasMany
   {
       return $this->hasMany(Rating::class, 'review_id', 'id');
   }

   /**
    * Get the user that owns the ReviewRelationship
    *
    * @return \
    */
   public function customer(): BelongsTo
   {
       return $this->belongsTo(Customer::class, 'customer_id', 'id');
   }

   public function product(): BelongsTo
   {
       return $this->belongsTo(Product::class, 'product_id', 'id');
   }


}


?>
