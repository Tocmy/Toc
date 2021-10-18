<?php

namespace App\Models\Rma;

use App\Traits\Addressable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rma extends Model
{
    use HasFactory,Addressable,SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'rmas';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'quantity', 'opened', 'comment', 'date_order', 'date_finish', 'po_number', 'ref', 'customer_id', 'rma_reason_id', 'rma_action_id', 'status_id', 'history_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'quantity' => 0,
        'opened' => false,
        'comment' => '',
        'date_order' => NULL,
        'date_finish' => NULL,
        'po_number' => '',
        'ref' => '',
        'customer_id' => 0,
        'rma_reason_id' => 0,
        'rma_action_id' => 0,
        'status_id' => 0,
        'history_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'opened' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'date_order', 'date_finish',
    ];



}
