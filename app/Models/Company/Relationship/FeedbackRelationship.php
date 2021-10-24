<?php
namespace App\Models\Company\Relationship;

use App\Models\Company\Company;
use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait FeedbackRelationship
{
   /**
    * Get the user that owns the FeedbackRelationship
    *
    * @return \
    */
   public function customer(): BelongsTo
   {
       return $this->belongsTo(Customer::class, 'customer_id', 'id');
   }

   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }

}

?>
