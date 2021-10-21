<?php
namespace App\Models\Voucher\Relationship;

use App\Models\Company\Company;
use App\Models\Order\Order;
use App\Models\Voucher\VoucherContent;
use App\Models\Voucher\VoucherHistory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 *
 */
trait VoucherRelationship
{
    /**
     * The roles that belong to the VoucherRelationship
     *
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_voucher', 'voucher_id', 'order_id')->withTimestamps();
    }

    /**
     * Get all of the comments for the VoucherRelationship
     *
     */
    public function voucherHistories(): HasMany
    {
        return $this->hasMany(VoucherHistory::class, 'voucher_id', 'id');
    }

    /**
     * Get the user that owns the VoucherRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'store_id', 'id');
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(VoucherContent::class, 'theme_id', 'id');
    }


}


?>
