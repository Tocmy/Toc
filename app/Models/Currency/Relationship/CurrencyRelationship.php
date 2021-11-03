<?php
namespace App\Models\Currency\Relationship;

use App\Models\Company\Company;
use App\Models\Invoice\Invoice;
use App\Models\Invoice\InvoicePayment;
use App\Models\Order\Order;
use App\Models\Payment\Payment;
use App\Models\Payment\Wallet;
use App\Models\Purchase\Purchase;
use App\Models\Quotation\Quotation;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
trait CurrencyRelationship
{
      /**
       * Get the user that owns the CurrencyRelationship
       *
       * @return \
       */
      public function setting(): BelongsTo
      {
          return $this->belongsTo(Setting::class, 'setting_id', 'id');
      }

      public function store(): BelongsTo
      {
          return $this->belongsTo(Company::class, 'store_id', 'id');
      }

      /**
       * Get all of the comments for the CurrencyRelationship
       *
       * @return \
       */
      public function invoicePayments(): HasMany
      {
          return $this->hasMany(InvoicePayment::class, 'currency_id', 'id');
      }

      public function invoices(): HasMany
      {
          return $this->hasMany(Invoice::class, 'currency_id', 'id');
      }

      public function orders(): HasMany
      {
          return $this->hasMany(Order::class, 'currency_id', 'id');
      }

      public function payments(): HasMany
      {
          return $this->hasMany(Payment::class, 'currency_id', 'id');
      }

      public function purchases(): HasMany
      {
          return $this->hasMany(Purchase::class, 'currency_id', 'id');
      }

      public function quotations(): HasMany
      {
          return $this->hasMany(Quotation::class, 'currency_id', 'id');
      }

      public function wallets(): HasMany
      {
          return $this->hasMany(Wallet::class, 'currency_id', 'id');
      }
}


?>
