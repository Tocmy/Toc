<?php
namespace App\Models\Module\Relationship;


/**
 *
 */
trait ModuleRelationship
{
    public function paymentMethods()
    {
        return $this->hasMany(App\Models\Payment\PaymentMethod::class, 'module_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function shippings()
    {
        return $this->hasMany(App\Models\Shipping\Shipping::class, 'module_id', 'id');
    }

}

?>
