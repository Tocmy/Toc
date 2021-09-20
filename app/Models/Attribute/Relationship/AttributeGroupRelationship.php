<?php
namespace App\Models\Attribute\Relationship;

use App\Models\Attribute\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait AttributeGroupRelationship
{
    /**
     * Get all of the attributes for the AttributeGroupRelationship
     *
     * @return \
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class, 'attribute_group_id', 'id');
    }
}

