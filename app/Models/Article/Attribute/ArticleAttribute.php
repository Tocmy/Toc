<?php
namespace App\Models\Article\Attribute;

/**
 *
 */
trait ArticleAttribute
{
    public function getSummaryAttribute()
    {
        if ($this->attributes['summary']) {
            return $this->attributes['summary'];
        }

        return substr(strip_tags($this->attributes['description']), 0, 120);
    }

    public function getImageAttribute()
    {
        return url('storage/uploads/'. $this->image );
    }

    
}

?>
