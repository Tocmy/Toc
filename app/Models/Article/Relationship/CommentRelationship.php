<?php
namespace App\Models\Article\Relationship;

use App\Models\Article\Article;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait CommentRelationship
{
    /**
     * Get the user that owns the CommentRelationship
     *
     * @return \
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public function reply(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'reply_id', 'id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Get all of the comments for the CommentRelationship
     *
     * @return \
     */
    public function replyComments(): HasMany
    {
        return $this->hasMany(Comment::class, 'reply_id', 'id');
    }

}

?>
