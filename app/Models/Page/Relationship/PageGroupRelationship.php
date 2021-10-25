<?php

namespace App\Models\Page\Relationship;

use App\Models\Customer\CustomerGroup;
use App\Models\Page\Page;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 *
 */
trait PageGroupRelationship
{


    /**
     * Get the user that owns the PageGroupRelationship
     *
     * @return \
     */
    public function customerGroup(): BelongsTo
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(PageGroup::class, 'parent_id', 'id');
    }

    public function page(): HasMany
    {
        return $this->hasMany(Page::class, 'page_group_id', 'id');
    }

    public function subGroup(): HasMany
    {
        return $this->hasMany(PageGroup::class, 'parent_id', 'id');
    }
}

