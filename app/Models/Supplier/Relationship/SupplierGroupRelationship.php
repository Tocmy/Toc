<?php
namespace App\Models\Supplier\Relationship;

use App\Models\Payment\PaymentMethod;
use App\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
/**
 *
 */
trait SupplierGroupRelationship
{
     /**
      * Get the user that owns the SupplierGroupRelationship
      *
      * @return \
      */
     public function paymentMethod(): BelongsTo
     {
         return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
     }

     /**
      * Get all of the comments for the SupplierGroupRelationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function suppliers(): HasMany
     {
         return $this->hasMany(Supplier::class, 'supplier_group_id', 'id');
     }
}

