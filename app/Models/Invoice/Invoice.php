<?php

namespace App\Models\Invoice;

use App\Traits\Addressable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, Addressable;
}
