<?php

namespace App\Models\Voucher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'vouchers';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'code', 'description', 'name', 'slug', 'series_no', 'quantity', 'sender', 'from_email', 'recipient', 'to_email', 'expiry_period', 'message', 'amount', 'status', 'theme_id', 'store_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'code' => '',
        'description' => '',
        'name' => '',
        'slug' => '',
        'series_no' => '',
        'quantity' => 0,
        'sender' => '',
        'from_email' => '',
        'recipient' => '',
        'to_email' => '',
        'expiry_period' => 0,
        'message' => '',
        'amount' => '0.0000',
        'status' => false,
        'theme_id' => 0,
        'store_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];
}
