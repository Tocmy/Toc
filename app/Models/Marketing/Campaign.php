<?php

namespace App\Models\Marketing;

use App\Models\Company\Relationship\CompanyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes, CompanyRelationship;

    /**
    * The table associated with the model.
    *digital crm
    * @var  string
    */
    protected $table = 'campaigns';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'subject', 'user_id', 'api_campaign_id', 'status', 'send_at',
        'subscriber_id', 'name', 'description', 'is_scheduled', 'scheduled_for', 'is_sent', 'sent_at', 'sent_count', 'attachments',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'subject' => '',
        'user_id' => 0,
        'api_campaign_id' => 0,
        'status' => false,
        'send_at' => NULL,
        'subscriber_id' => 0,
        'name' => '',
        'description' => NULL,
        'is_scheduled' => false,
        'scheduled_for' => NULL,
        'is_sent' => false,
        'sent_at' => NULL,
        'sent_count' => 0,
        'attachments' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'is_scheduled' => 'boolean',
        'is_sent' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'send_at', 'scheduled_for', 'sent_at',
    ];
}
