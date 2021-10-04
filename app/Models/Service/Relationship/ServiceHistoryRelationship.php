<?php
namespace App\Models\Service\Relationship;

/**
 *
 */
trait ServiceHistoryRelationship
{
    public function history()
    {
        return $this->belongsTo(App\Models\General\History::class, 'history_id', 'id');
    }

    /**
    * Get the single record associated with this model.
    */
    public function service()
    {
        return $this->belongsTo(App\Models\Service\Service::class, 'service_id', 'id');
    }
}

?>
