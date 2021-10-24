<?php
namespace App\Models\Tool\Relationship;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 *
 */
trait PrinterRelationship
{
   /**
    * Get the user that owns the PrinterRelationship
    *
    */
   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }
}

?>
