<?php
namespace App\Models\Loyalty\Relationship;

use App\Models\Customer\Customer;
use App\Models\Loyalty\Loyalty;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait LoyaltyRedeemRelationship
{
    /**
     * Get the user that owns the LoyaltyRedeemRelationship
     *
     * @return \
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function loyalty(): BelongsTo
    {
        return $this->belongsTo(Loyalty::class, 'loyalty_id', 'id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}


?>
