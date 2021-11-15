<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Address;
use App\Models\Shipping\DeliveryCity;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 *
 */
trait CityRelationship
{


    /**
     * Get all of the comments for the CityRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'city_id', 'id');
    }

    public function deliveryCities(): HasMany
    {
        return $this->hasMany(DeliveryCity::class, 'city_id', 'id');
    }


    /**
     * Get the state that owns the CityRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}

