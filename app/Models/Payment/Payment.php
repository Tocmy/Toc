<?php

namespace App\Models\Payment;

use App\Models\Payment\Relationship\PaymentRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes,PaymentRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'paid_at', 'amount', 'description', 'reference', 'attachment',
         'store_id', 'payment_method_id', 'supplier_id', 'currency_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'paid_at' => NULL,
        'amount' => NULL,
        'description' => NULL,
        'reference' => NULL,
        'attachment' => NULL,
        'store_id' => 0,
        'payment_method_id' => 0,
        'supplier_id' => 0,
        'currency_id' => 0,
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'paid_at',
    ];


}
