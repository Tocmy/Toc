<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Category\Category;
use App\Models\Customer\CustomerGroup;
use App\Models\Marketing\Coupon;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait RestrictRelationship
{
      /**
       * The roles that belong to the RestrictRelationship
       *
       * @return \
       */
      public function coupons(): BelongsToMany
      {
          return $this->belongsToMany(Coupon::class, 'coupon_restrict', 'restrict_id', 'coupon_id')
                      ->withTimestamps()
                      ->withPivot('is_restrict', 'exclude');
      }

      /**
       * Get the user that owns the RestrictRelationship
       *
       * @return \
       */
      public function category(): BelongsTo
      {
          return $this->belongsTo(Category::class, 'category_id', 'id');
      }

      public function customerGroup(): BelongsTo
      {
          return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
      }

      public function product(): BelongsTo
      {
          return $this->belongsTo(Product::class, 'product_id', 'id');
      }

      public function setting(): BelongsTo
      {
          return $this->belongsTo(Setting::class, 'setting_id', 'id');
      }


}

?>
