<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order\Relationship\OrderRelationship as OrderRelationship;
use App\Traits\Addressable;

class Order extends Model
{
    use HasFactory, softDeletes, OrderRelationship, Addressable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'invoice_no', 'invoice_prefix', 'store_id', 'customer_id', 'address_id', 'customer_group_id', 'status_id', 'affiliate_id',
        'currency_id', 'payment_method_id', 'store_name', 'store_url', 'comment', 'total', 'commission', 'currency_code', 'currency_value',
        'forward_ip', 'ip', 'customer_agent', 'accepted_langauge',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    //function invoiceNumber()
//{
    //$latest = Order::latest()->first();

    //if (! $latest) {
        //return 'arm0001';
    //}

    //$string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);

    //return 'arm' . sprintf('%04d', $string+1);
//}

}
