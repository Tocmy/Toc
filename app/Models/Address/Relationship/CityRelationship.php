<?php
namespace App\Models\Address\Relationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait CityRelationship
{
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

