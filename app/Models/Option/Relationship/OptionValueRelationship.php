<?php
namespace App\Models\Option\Relationship;

use App\Models\Customer\CustomerBasketAttribute;
use App\Models\Customer\WishlistOption;
use App\Models\Option\Option;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait OptionValueRelationship
{
    public function customerBasketAttributes():HasMany
    {
        return $this->hasMany(CustomerBasketAttribute::class, 'option_value_id', 'id');
    }

    /**
    * Get the single record associated with this model.
    */
    public function option():BelongsTo
    {
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function wishlistOptions():HasMany
    {
        return $this->hasMany(WishlistOption::class, 'option_value_id', 'id');
    }
}

?>
