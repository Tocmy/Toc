<?php
namespace App\Models\General\Relationship;


use App\Models\Customer\CustomerField;
use App\Models\Customer\CustomerGroup;
use App\Models\General\CustomFieldValue;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait CustomFieldRelationship
{
   /**
    * Get all of the comments for the CustomFieldRelationship
    *
    * @return \
    */
   public function customFieldValues(): HasMany
   {
       return $this->hasMany(CustomFieldValue::class, 'custom_field_id', 'id');
   }

   public function customerFields(): HasMany
   {
       return $this->hasMany(CustomerField::class, 'custom_field_id', 'id');
   }

   public function orderFields(): HasMany
   {
       return $this->hasMany(OrderCustomField::class, 'custom_field_id', 'id');
   }


   /**
    * Get the user that owns the CustomFieldRelationship
    *
    * @return \
    */
   public function customerGroup(): BelongsTo
   {
       return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
   }


}


?>
