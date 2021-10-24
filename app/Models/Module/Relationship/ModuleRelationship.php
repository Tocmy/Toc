<?php
namespace App\Models\Module\Relationship;

use App\Models\Payment\PaymentMethod;
use App\Models\Shipping\Shipping;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait ModuleRelationship
{

    /**
     * Get all of the comments for the ModuleRelationship
     *
     * @return \
     */


    public function paymentMethods(): HasMany
    {
        return $this->hasMany(PaymentMethod::class, 'module_id', 'id');
    }


    public function shippingMethods(): HasMany
    {
        return $this->hasMany(Shipping::class, 'module_id', 'id');
    }

}

?>
