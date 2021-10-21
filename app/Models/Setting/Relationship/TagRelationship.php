<?php
namespace App\Models\Setting\Relationship;

use App\Models\Setting\TagGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait TagRelationship
{
   /**
    * Get the user that owns the TagRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function tagGroup(): BelongsTo
   {
       return $this->belongsTo(TagGroup::class, 'tag_group_id', 'id');
   }
}


?>
