<?php
namespace App\Models\Banner\Relationship;

/**
 *
 */
trait ImageRelationship
{

       /**
        * Get the user that owns the ImageRelationship
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function banner()
       {
           return $this->belongsTo(App\Models\Banner\Banner::class, 'banner_id', 'id');
       }

       public function product()
       {


        return $this->belongsTo(App\Models\Product\Product::class, 'product_id', 'id');

        }
}
