<?php
namespace App\Models\Supplier\Attribute;



/**
 *
 */
trait SupplierAttribute
{
       public function getImageAttribute()
       {
           if ($this->image != null) {
               return url('storage/uploads/'. $this->image);
           }
           return NULL;
       }
}


?>
