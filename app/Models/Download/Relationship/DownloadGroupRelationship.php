<?php
namespace App\Models\Download\Relationship;

/**
 *
 */
trait DownloadGroupRelationship
{

    public function downloads()
    {
        return $this->hasMany(App\Models\Download\Download::class, 'download_group_id', 'id');
    }

}



