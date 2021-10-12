<?php

namespace App\Models\Page\Relationship;

/**
 *
 */
trait PageRelationship
{
    public function pageGroup() {
        return $this->belongsTo(\App\Models\Page\PageGroup::class, 'page_group_id', 'id');
    }

    public function getMeta() {
        return $this->belongsTo(\App\Models\Setting\Meta::class, 'meta_id', 'id');
    }

    public function companies() {
        return $this->belongsToMany(\App\Models\Company\Company::class, 'page_store', 'page_id', 'store_id');
    }

    public function customerGroup() {
        return $this->belongsTo(\App\Models\Customer\CustomerGroup::class, 'customer_group_id', 'id');
    }

    public function parent() {
        return $this->belongsTo(\App\Models\Page\Page::class, 'parent_id', 'id');
    }


    public function subpages() {
        return $this->hasMany(\App\Models\Page\Page::class, 'parent_id', 'id');
    }
}

