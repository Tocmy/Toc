<?php

namespace App\Models\Company\Relationship;

/**
 *
 */
trait CompanyRelationship
{
   public function address()
   {
       return $this->belongsTo(\App\Models\Address\Address::class,'address_id','id');
   }

   public function setting()
   {
       return $this->belongsTo(\App\Models\Setting\Setting::class,'setting_id', 'id');
   }
}




