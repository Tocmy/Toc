<?php

namespace App\Models\Page\Relationship;

use App\Models\Company\Company;
use App\Models\Page\PageGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait PageRelationship
{
    public function pageGroup(): BelongsTo
    {
        return $this->belongsTo(PageGroup::class, 'page_group_id', 'id');
    }

    /**
     * Get the user that owns the PageRelationship
     *
     * @return \
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'store_id', 'id');
    }

}

