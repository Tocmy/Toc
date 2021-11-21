<?php
namespace App\Models\Supplier\Relationship;

use App\Models\Company\Company;
use App\Models\Payment\Merchant;
use App\Models\Payment\Payment;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseReturn;
use App\Models\Purchase\StockReceive;
use App\Models\Service\ServicePart;
use App\Models\Shipping\Carrier;
use App\Models\Supplier\SupplierGroup;
use App\Models\Supplier\SupplierSetting;
use Illuminate\Database\Eloquent\Relations\{HasMany,BelongsTo};
/**
 *
 */
trait SupplierRelationship
{
   /**
    * Get all of the comments for the SupplierRelationship
    *
    * @return \
    */
   public function carriers(): HasMany
   {
       return $this->hasMany(Carrier::class, 'supplier_id', 'id');
   }

   public function merchants(): HasMany
   {
       return $this->hasMany(Merchant::class, 'supplier_id', 'id');
   }

   public function payments(): HasMany
   {
       return $this->hasMany(Payment::class, 'supplier_id', 'id');
   }

   public function purchaseReturns(): HasMany
   {
       return $this->hasMany(PurchaseReturn::class, 'supplier_id', 'id');
   }

   public function purchases(): HasMany
   {
       return $this->hasMany(Purchase::class, 'supplier_id', 'id');
   }

   public function serviceParts(): HasMany
   {
       return $this->hasMany(ServicePart::class, 'supplier_id', 'id');
   }

   public function stockReceives(): HasMany
   {
       return $this->hasMany(StockReceive::class, 'supplier_id', 'id');
   }

   public function supplierSettings(): HasMany
   {
       return $this->hasMany(SupplierSetting::class, 'supplier_id', 'id');
   }


   /**
    * Get the user that owns the SupplierRelationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }

   public function supplierGroup(): BelongsTo
   {
       return $this->belongsTo(SupplierGroup::class, 'sopplier_group_id', 'id');
   }


}


