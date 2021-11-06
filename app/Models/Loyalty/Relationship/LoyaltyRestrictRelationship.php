<?php
namespace App\Models\Loyalty\Relationship;

use App\Models\Loyalty\LoyaltyGroup;
use App\Models\Marketing\Restrict;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait LoyaltyRestrictRelationship
{
   /**
    * Get the user that owns the LoyaltyRestrictRelationship
    *
    * @return \
    */
   public function loyaltyGroup(): BelongsTo
   {
       return $this->belongsTo(LoyaltyGroup::class, 'loyalty_group_id', 'id');
   }

   public function restrict(): BelongsTo
   {
       return $this->belongsTo(Restrict::class, 'restrict_id', 'id');
   }

}


?>
