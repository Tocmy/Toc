<?php
namespace App\Models\User\Relationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait SecurityRelation
{
    /**
     * Get the user that owns the SecurityRelation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(App\Models\User\User::class, 'user_id', 'id');
    }
}


?>
