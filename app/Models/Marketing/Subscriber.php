<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\SubscriberRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, SubscriberRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'subscribers';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'customer_id', 'approved', 'email', 'firstname', 'lastname', 'confirmation_code', 'blacklist',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'customer_id' => 0,
        'approved' => NULL,
        'email' => NULL,
        'firstname' => '',
        'lastname' => '',
        'confirmation_code' => '',
        'blacklist' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'approved' => 'boolean',
        'blacklist' => 'boolean',
    ];

}
