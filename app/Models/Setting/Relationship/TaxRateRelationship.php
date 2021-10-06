<?php
namespace App\Models\Setting\Relationship;

/**
 *
 */
trait TaxRateRelationship
{
    public function insuranceTaxes()
    {
        return $this->hasMany(App\Models\Insurance\InsuranceTax::class, 'tax_rate_id', '');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function services()
    {
        return $this->hasMany(App\Models\Service\Service::class, 'tax_rate_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function shippingTax()
    {
        return $this->hasMany(App\Models\Shipping\ShippingTax::class, 'tax_rate_id', '');
    }

    /**
    * Get the single record associated with this model.
    */
    public function customerGroup()
    {
        return $this->belongsTo(App\Models\Customer\CustomerGroup::class, 'customer_group_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function taxRules()
    {
        return $this->hasMany(App\Models\Setting\TaxRule::class, 'tax_rate_id', 'id');
    }
}

?>
