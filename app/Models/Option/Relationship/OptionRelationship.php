<?php
namespace App\Models\Option\Relationship;

/**
 *
 */
trait OptionRelationship
{
    public function customerBasketAttributes()
    {
        return $this->hasMany(App\Models\Customer\CustomerBasketAttribute::class, 'option_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function optionValues()
    {
        return $this->hasMany(App\Models\Option\OptionValue::class, 'option_id', 'id');
    }

    /**
    * Get the single record associated with this model.
    */
    public function type()
    {
        return $this->belongsTo(App\Models\General\Type::class, 'type_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function productOptions()
    {
        return $this->hasMany(App\Models\Product\ProductOption::class, 'option_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function wishlistOptions()
    {
        return $this->hasMany(App\Models\Customer\WishlistOption::class, 'option_id', 'id');
    }


}

?>
