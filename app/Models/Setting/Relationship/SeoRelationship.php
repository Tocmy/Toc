<?php
namespace App\Models\Setting\Relationship;

/**
 *
 */
trait SeoRelationship
{
      public function seoable()
      {
        return $this->morphTo();
      }
}

?>
