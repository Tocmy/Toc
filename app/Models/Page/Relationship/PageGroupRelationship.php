<?php

namespace App\Models\Page\Relationship;

/**
 *
 */
trait PageGroupRelationship
{
    public function page() {
        return $this->hasMany(\App\Models\Page\Page::class, 'page_group_id', 'id');
    }
}

