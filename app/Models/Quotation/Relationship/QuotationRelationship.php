<?php

namespace App\Models\Quotation\Relationship;

use App\Models\Currency\Currency;
use App\Models\Customer\Customer;
use App\Models\General\History;
use App\Models\Product\Product;
use App\Models\Setting\Status;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait QuotationRelationship
{
    /**
     * Get all of the comments for the QuotationRelationship
     *
     * @return \
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'quote_id', 'id');
    }

    /**
     * Get the user that owns the QuotationRelationship
     *
     * @return \
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function history(): BelongsTo
    {
        return $this->belongsTo(History::class, 'history_id', 'id');
    }

    public function requote(): BelongsTo
    {
        return $this->belongsTo(Quotation::class, 'requote_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }






}

