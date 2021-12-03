<?php
namespace App\Models\Product\Relationship;

use App\Models\Customer\CustomerGroup;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait ProductGroupRelationship
{
     /**
      * Get the user that owns the ProductGroupRelationship
      *
      * @return \
      */
     public function customerGroup(): BelongsTo
     {
         return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
     }

     public function setting(): BelongsTo
     {
         return $this->belongsTo(Setting::class, 'setting_id', 'id');
     }
}

?>
