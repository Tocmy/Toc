<?php
namespace App\Models\Tool\Relationship;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait BarcodeRelationship
{
     /**
      * Get the user that owns the BarcodeRelationship
      *
      * @return \
      */
     public function store(): BelongsTo
     {
         return $this->belongsTo(Company::class, 'store_id', 'id');
     }
}


?>
