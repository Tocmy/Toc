<?php
namespace App\Models\General\Relationship;

/**
 *
 */
trait TypeRelationship
{
     public function typeable()
     {
         return $this->morphTo();
     }
}


