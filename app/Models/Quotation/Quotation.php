<?php

namespace App\Models\Quotation;

use App\Models\Quotation\Relationship\QuotationRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Quotation extends Model
{
    use HasFactory, SoftDeletes, QuotationRelationship ;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'quotations';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'quote_send', 'expiry_date', 'description', 'subject', 'term',
        'payment_term', 'delivery_term', 'ref', 'customer_id', 'store_id', 'tax_id', 'requote_id', 'currency_id', 'history_id', 'status_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'quote_send' => NULL,
        'expiry_date' => NULL,
        'description' => '',
        'subject' => '',
        'term' => '',
        'payment_term' => '',
        'delivery_term' => '',
        'ref' => '',
        'customer_id' => 0,
        'store_id' => 0,
        'tax_id' => 0,
        'requote_id' => 0,
        'currency_id' => 0,
        'history_id' => 0,
        'status_id' => 0,
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'quote_send', 'expiry_date',
    ];

}
