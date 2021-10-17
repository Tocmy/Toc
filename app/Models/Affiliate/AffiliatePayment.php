<?php

namespace App\Models\Affiliate;

use App\Traits\Addressable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatePayment extends Model
{
    use HasFactory, Addressable;
}
