<?php
namespace App\Models\Setting\Relationship;

/**
 *
 */
trait TaxRuleRelationship
{
    public function tax()
    {
        return $this->belongsTo(App\Models\Setting\Tax::class, 'tax_id', 'id');
    }

    /**
    * Get the single record associated with this model.
    */
    public function taxRate()
    {
        return $this->belongsTo(App\Models\Setting\TaxRate::class, 'tax_rate_id', 'id');
    }
}

?>

