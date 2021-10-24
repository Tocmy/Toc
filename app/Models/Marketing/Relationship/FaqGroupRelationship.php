<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Marketing\FaqGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait FaqGroupRelationship
{
   /**
    * Get the user that owns the FaqGroupRelationship
    *
    * @return \
    */
   public function parent(): BelongsTo
   {
       return $this->belongsTo(FaqGroup::class, 'parent_id', 'id');
   }

   public function subGroup(): HasMany
   {
       return $this->hasMany(FaqGroup::class, 'parent_id', 'id');
   }
}


?>
