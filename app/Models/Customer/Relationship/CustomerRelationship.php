<?php

namespace App\Models\Customer\Relationship;

use App\Models\Article\Comment;
use App\Models\Company\Company;
use App\Models\Company\Feedback;
use App\Models\Customer\CustomerBan;
use App\Models\Customer\CustomerBasket;
use App\Models\Customer\CustomerField;
use App\Models\Customer\CustomerGroup;
use App\Models\Customer\CustomerIp;
use App\Models\Customer\CustomerOnline;
use App\Models\Customer\Wishlist;
use App\Models\Invoice\Invoice;
use App\Models\Loyalty\Loyalty;
use App\Models\Loyalty\LoyaltyStatus;
use App\Models\Marketing\CouponHistory;
use App\Models\Marketing\CouponRedeem;
use App\Models\Marketing\CouponTrack;
use App\Models\Marketing\Rating;
use App\Models\Marketing\Review;
use App\Models\Marketing\Subscriber;
use App\Models\Order\Order;
use App\Models\Order\OrderFraud;
use App\Models\Payment\PaymentMethod;
use App\Models\Payment\Wallet;
use App\Models\Product\Bid;
use App\Models\Quotation\Quotation;
use App\Models\Rma\Rma;
use App\Models\Service\Contract;
use App\Models\Service\Service;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait CustomerRelationship
{
   /**
    * Get all of the comments for the CustomerRelationship
    *
    * @return \
    */
   public function bids(): HasMany
   {
       return $this->hasMany(Bid::class, 'customer_id', 'id');
   }

   public function comments(): HasMany
   {
       return $this->hasMany(Comment::class, 'customer_id', 'id');
   }

   public function contracts(): HasMany
   {
       return $this->hasMany(Contract::class, 'customer_id', 'id');
   }

   public function couponHistories(): HasMany
   {
       return $this->hasMany(CouponHistory::class, 'customer_id', 'id');
   }

   public function couponRedeems(): HasMany
   {
       return $this->hasMany(CouponRedeem::class, 'customer_id', 'id');
   }
   public function couponTrack(): HasMany
   {
       return $this->hasMany(CouponTrack::class, 'customer_id', 'id');
   }
   public function customerBans(): HasMany
   {
       return $this->hasMany(CustomerBan::class, 'customer_id', 'id');
   }

   public function customerBasket(): HasMany
   {
       return $this->hasMany(CustomerBasket::class, 'customer_id', 'id');
   }
   public function customerFields(): HasMany
   {
       return $this->hasMany(CustomerField::class, 'customer_id', 'id');
   }

   //public function customerHistories(): HasMany
   //{
       //return $this->hasMany(CustomerHistory::class, 'customer_id', 'id');
   //}

   public function customerIps(): HasMany
   {
       return $this->hasMany(CustomerIp::class, 'customer_id', 'id');
   }

   public function customerOnline(): HasMany
   {
       return $this->hasMany(CustomerOnline::class, 'customer_id', 'id');
   }

   public function feedback(): HasMany
   {
       return $this->hasMany(Feedback::class, 'customer_id', 'id');
   }

   public function invoice(): HasMany
   {
       return $this->hasMany(Invoice::class, 'customer_id', 'id');
   }

   public function loyalties(): HasMany
   {
       return $this->hasMany(Loyalty::class, 'customer_id', 'id');
   }

   public function loyaltyRedeems(): HasMany
   {
       return $this->hasMany(LoyaltyRedeem::class, 'customer_id', 'id');
   }
   public function loyaltyStatus(): HasMany
   {
       return $this->hasMany(LoyaltyStatus::class, 'customer_id', 'id');
   }
   public function OrderFrauds(): HasMany
   {
       return $this->hasMany(OrderFraud::class, 'customer_id', 'id');
   }

   public function orders(): HasMany
   {
       return $this->hasMany(Order::class, 'customer_id', 'id');
   }

   public function quotations(): HasMany
   {
       return $this->hasMany(Quotation::class, 'customer_id', 'id');
   }
   public function ratings(): HasMany
   {
       return $this->hasMany(Rating::class, 'customer_id', 'id');
   }
   public function reviews(): HasMany
   {
       return $this->hasMany(Review::class, 'customer_id', 'id');
   }

   public function rmas(): HasMany
   {
       return $this->hasMany(Rma::class, 'customer_id', 'id');
   }
   public function services(): HasMany
   {
       return $this->hasMany(Service::class, 'customer_id', 'id');
   }

   public function subscribers(): HasMany
   {
       return $this->hasMany(Subscriber::class, 'customer_id', 'id');
   }

   public function wallets(): HasMany
   {
       return $this->hasMany(Wallet::class, 'customer_id', 'id');
   }

   public function wishlists(): HasMany
   {
       return $this->hasMany(Wishlist::class, 'customer_id', 'id');
   }

   /**
    * Get the user that owns the CustomerRelationship
    *
    * @return \    */
   public function customerGroup(): BelongsTo
   {
       return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
   }

   public function paymentMethod(): BelongsTo
   {
       return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
   }

   public function store(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'store_id', 'id');
   }

   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'user_id', 'id');
   }

}



