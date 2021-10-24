<?php

namespace App\Models\Marketing;


use App\Models\Marketing\Relationship\CampaignRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Campaign extends Model
{
    use HasFactory, SoftDeletes, CampaignRelationship;

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
        'subject', 'api_campaign_id', 'status', 'send_at', 'name', 'description', 'is_scheduled',
         'scheduled_for', 'is_sent', 'sent_at', 'sent_count', 'attachments', 'user_id', 'subscriber_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'subject' => '',
        'api_campaign_id' => 0,
        'status' => false,
        'send_at' => NULL,
        'name' => '',
        'description' => NULL,
        'is_scheduled' => false,
        'scheduled_for' => NULL,
        'is_sent' => false,
        'sent_at' => NULL,
        'sent_count' => 0,
        'attachments' => NULL,
        'user_id' => 0,
        'subscriber_id' => 0,
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
