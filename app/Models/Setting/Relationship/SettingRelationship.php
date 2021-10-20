<?php
namespace App\Models\Setting\Relationship;

use App\Models\Company\Company;
use App\Models\Currency\Currency;
use App\Models\Customer\CustomerGroup;
use App\Models\Loyalty\LoyaltyGroup;
use App\Models\Marketing\Coupon;
use App\Models\Marketing\Restrict;
use App\Models\Product\Discount;
use App\Models\Product\PriceGroup;
use App\Models\Product\ProductGroup;
use App\Models\Setting\SettingGroup;
use App\Models\Shipping\Shipping;
use App\Models\Supplier\SupplierSetting;
use Illuminate\Database\Eloquent\Relations\HasMany;
Use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait SettingRelationship
{
   /**
    * Get all of the comments for the SettingRelationship
    *
    * @return \
    */
   public function companies(): HasMany
   {
       return $this->hasMany(Company::class, 'setting_id', 'id');
   }

   public function coupons(): HasMany
   {
       return $this->hasMany(Coupon::class, 'setting_id', 'id');
   }

   public function currency(): HasMany
   {
       return $this->hasMany(Currency::class, 'setting_id', 'id');
   }

   public function customerGroups(): HasMany
   {
       return $this->hasMany(CustomerGroup::class, 'setting_id', 'id');
   }

   public function discounts(): HasMany
   {
       return $this->hasMany(Discount::class, 'setting_id', 'id');
   }

   public function loyaltyGroups(): HasMany
   {
       return $this->hasMany(LoyaltyGroup::class, 'setting_id', 'id');
   }

   public function paymentSetting(): HasMany
   {
       return $this->hasMany(PaymentSetting::class, 'setting_id', 'id');
   }

   public function priceGroups(): HasMany
   {
       return $this->hasMany(PriceGroup::class, 'setting_id', 'id');
   }

   public function productGroups(): HasMany
   {
       return $this->hasMany(ProductGroup::class, 'setting_id', 'id');
   }

   public function restricts(): HasMany
   {
       return $this->hasMany(Restrict::class, 'setting_id', 'id');
   }

   public function shippings(): HasMany
   {
       return $this->hasMany(Shipping::class, 'setting_id', 'id');
   }

   public function supplierSettings(): HasMany
   {
       return $this->hasMany(SupplierSetting::class, 'setting_id', 'id');
   }

   /**
    * Get the user that owns the SettingRelationship
    *
    */
   public function settingGroup(): BelongsTo
   {
       return $this->belongsTo(SettingGroup::class, 'setting_group_id', 'id');
   }

}

