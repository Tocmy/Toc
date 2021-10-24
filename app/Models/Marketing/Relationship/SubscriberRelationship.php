<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Customer\Customer;
use App\Models\Marketing\Campaign;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait SubscriberRelationship
{
   /**
    * Get all of the comments for the SubscriberRelationship
    *
    * @return \
    */
   public function campaigns(): HasMany
   {
       return $this->hasMany(Campaign::class, 'subscriber_id', 'id');
   }

   /**
    * Get the user that owns the SubscriberRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(Customer::class, 'customer_id', 'id');
   }
}

?>
