<?php
namespace App\Models\Attribute\Relationship;

use App\Models\Attribute\AttributeGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait AttributeRelationship
{
     /**
      * Get the attributeGroup that owns the AttributeRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function attributeGroup(): BelongsTo
     {
         return $this->belongsTo(AttributeGroup::class, 'attribute_group_id', 'id');
     }

     public function productAttribute(): HasMany
     {
         return $this->hasMany(App\Models\Product\Product::class, 'attribute_id', 'id');
     }

     public function purchaseAttribute(): HasMany
     {
         return $this->hasMany(App\Models\Purchase\PurchaseAttribute::class, 'attribute_id', 'id');
     }
}

