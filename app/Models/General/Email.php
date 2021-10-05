<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, softDeletes;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'label',
        'recipient',
        'cc',
        'bcc',
        'subject',
        'view',
        'variables',
        'body',
        'from',
        'attachments',
        'attempts',
        'sending',
        'failed', 'error', 'encrypted', 'scheduled_at', 'sent_at', 'delivered_at',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'label' => NULL,
        'recipient' => '',
        'cc' => NULL,
        'bcc' => NULL,
        'subject' => '',
        'view' => '',
        'variables' => NULL,
        'body' => '',
        'from' => NULL,
        'attachments' => NULL,
        'attempts' => NULL,
        'sending' => false,
        'failed' => false,
        'error' => NULL,
        'encrypted' => false,
        'scheduled_at' => NULL,
        'sent_at' => NULL,
        'delivered_at' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'sending' => 'boolean',
        'failed' => 'boolean',
        'encrypted' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'scheduled_at', 'sent_at', 'delivered_at',
    ];
}
