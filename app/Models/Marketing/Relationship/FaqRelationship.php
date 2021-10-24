<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Company\Company;
use App\Models\Marketing\FaqGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait FaqRelationship
{
   /**
    * Get the user that owns the FaqRelationship
    *
    * @return \
    */
   public function faqGroup(): BelongsTo
   {
       return $this->belongsTo(FaqGroup::class, 'faq_group_id', 'id');
   }

   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }
}

?>
