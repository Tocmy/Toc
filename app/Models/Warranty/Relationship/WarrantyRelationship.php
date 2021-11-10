<?php
namespace App\Models\Warranty\Relationship;

use App\Models\General\Type;
use App\Models\Service\Service;
use App\Models\Warranty\WarrantyProduct;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, BelongsTo, HasMany};


/**
 *
 */
trait WarrantyRelationship
{
     /**
      * The roles that belong to the WarrantyRelationship
      *
      * @return \
      */
     public function services(): BelongsToMany
     {
         return $this->belongsToMany(Service::class, 'service_warranty', 'waranty_id', 'service_id')
                     ->withTimestamps()
                     ->withPivot('name');

     }

     /**
      * Get the user that owns the WarrantyRelationship
      *
      * @return \
      */
     public function type(): BelongsTo
     {
         return $this->belongsTo(Type::class, 'type_id', 'id');
     }

     /**
      * Get all of the comments for the WarrantyRelationship
      *
      * @return \
      */
     public function warrantyProducts(): HasMany
     {
         return $this->hasMany(WarrantyProduct::class, 'warranty_id', 'id');
     }


}


?>
