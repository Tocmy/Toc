<?php
namespace App\Models\Address\Relationship;

use App\Models\Address\Address;
use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\Zone;
use App\Models\Shipping\DeliveryStates;
use App\Models\Shipping\Postal;
use App\Models\Shipping\ShippingMarkup;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait StateRelationship
{
    /**
     * Get all of the cities for the StateRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'state_id', 'id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }

    public function deliveryStates(): HasMany
    {
        return $this->hasMany(DeliveryStates::class, 'state_id', 'id');
    }

    public function postals(): HasMany
    {
        return $this->hasMany(Postal::class, 'state_id', 'id');
    }

    public function shippingMarkups(): HasMany
    {
        return $this->hasMany(ShippingMarkup::class, 'state_id', 'id');
    }

    public function zones(): HasMany
    {
        return $this->hasMany(Zone::class, 'state_id', 'id');
    }

    /**
     * Get the user that owns the StateRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
