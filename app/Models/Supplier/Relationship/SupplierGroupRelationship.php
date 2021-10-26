<?php
namespace App\Models\Supplier\Relationship;

use App\Models\Payment\PaymentMethod;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}

