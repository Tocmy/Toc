<?php
namespace App\Models\User\Relationship;

/**
 *
 */
trait ConfirmationRelationship
{
    public function user()
    {
        return $this->belongsTo(App\Modesls\User\User::class,'user_id', 'id');
    }
}
