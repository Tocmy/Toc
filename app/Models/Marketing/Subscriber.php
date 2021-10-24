<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\SubscriberRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Subscriber extends BaseModel
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
        'approved', 'email', 'first_name', 'last_name', 'confirmation_code', 'blacklist', 'customer_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'approved' => NULL,
        'email' => NULL,
        'first_name' => '',
        'last_name' => '',
        'confirmation_code' => '',
        'blacklist' => false,
        'customer_id' => 0,
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
