<?php
namespace App\Models\Option\Relationship;

use App\Models\Customer\CustomerBasketAttribute;
use App\Models\Customer\WishlistOption;
use App\Models\General\Type;
use App\Models\Option\OptionValue;
use App\Models\Product\ProductOption;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 *
 */
trait OptionRelationship
{

    /**
     * Get all of the comments for the OptionRelationship
     *
     * @return \
     */


    public function customerBasketAttributes(): HasMany
    {
        return $this->hasMany(CustomerBasketAttribute::class, 'option_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function optionValues(): HasMany
    {
        return $this->hasMany(OptionValue::class, 'option_id', 'id');
    }

    /**
    * Get the single record associated with this model.
    */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function productOptions():HasMany
    {
        return $this->hasMany(ProductOption::class, 'option_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function wishlistOptions():HasMany
    {
        return $this->hasMany(WishlistOption::class, 'option_id', 'id');
    }


}

?>
