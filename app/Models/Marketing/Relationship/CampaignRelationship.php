<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Marketing\Subscriber;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait CampaignRelationship
{
   /**
    * Get the user that owns the CampaignRelationship
    *
    * @return \
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'user_id', 'id');
   }

   public function subscriber(): BelongsTo
   {
       return $this->belongsTo(Subscriber::class, 'subscriber_id', 'id');
   }
}

?>
