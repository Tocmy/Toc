<?php
namespace App\Models\Product\Relationship;

use App\Model\Auction\Auction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait BidRelationship
{
   /**
    * Get the user that owns the BidRelationship
    *
    * @return \
    */
   public function auction(): BelongsTo
   {
       return $this->belongsTo(Auction::class, 'auction_id', 'id');
   }
}


?>
