<?php
namespace App\Models\Setting\Relationship;


/**
 *
 */
trait TaxRelationship
{
    public function products()
    {
        return $this->hasMany(App\Models\Product\Product::class, 'tax_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function purchases()
    {
        return $this->hasMany(App\Models\Purchase\Purchase::class, 'tax_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function quotations()
    {
        return $this->hasMany(App\Models\Quotation\Quotation::class, 'tax_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function taxRules()
    {
        return $this->hasMany(App\Models\Setting\TaxRule::class, 'tax_id', 'id');
    }

}

?>
