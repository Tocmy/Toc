<?php
namespace App\Models\Option\Relationship;

/**
 *
 */
trait OptionValueRelationship
{
    public function customerBasketAttributes()
    {
        return $this->hasMany(App\Models\Customer\CustomerBasketAttribute::class, 'option_value_id', 'id');
    }

    /**
    * Get the single record associated with this model.
    */
    public function option()
    {
        return $this->belongsTo(App\Models\Option\Option::class, 'option_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function wishlistOptions()
    {
        return $this->hasMany(App\Models\Customer\WishlistOption::class, 'option_value_id', 'id');
    }
}

?>
