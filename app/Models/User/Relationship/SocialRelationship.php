<?php
namespace App\Models\User\Relationship;


trait SocialRelationship
{
    public function user()
    {
        return $this->belongsTo(App\Models\User\User::class, 'user_id', 'id');
    }
}

?>
