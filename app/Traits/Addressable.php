<?php
namespace App\Traits;

use App\Models\Address\Address;

/**
 *
 */
trait Addressable
{
   public function hasAddress()
   {
       return $this->addresses->count();
   }

   public function address()
   {
       return $this->addresses->first();
   }

   public function addresses()
   {
       return $this->morphMany(Address::class, 'addressable');
   }

   public function primaryAddress()
   {
       return $this->morpOne(Address::class, 'addressable')
                   ->where('address_type', 'Primary');
   }

   public function billingAddress()
   {
       return $this->morpOne(Address::class, 'addressable')
                   ->where('address_type', 'Billing');
   }
   public function shippingAddress()
   {
       return $this->morpOne(Address::class, 'addressable')
                   ->where('address_type', 'Shipping');
   }

   public function removeAddresses()
   {
       return $this->addresses()->delete();
   }

   
}

?>
