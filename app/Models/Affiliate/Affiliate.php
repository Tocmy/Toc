<?php

namespace App\Models\Affiliate;

use App\Models\Affiliate\Relationship\AffiliateRelationship;
use App\Traits\Addressable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory, AffiliateRelationship, Addressable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'affiliates';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lifetime', 'web', 'code', 'payment', 'tax', 'ip', 'status', 'approved', 'user_id',
         'newsletter_id', 'payment_method_id', 'commission_id',
    ];

    protected $attributes = [
        'lifetime' => 0,
        'web' => '',
        'code' => '',
        'payment' => '',
        'tax' => '',
        'ip' => '',
        'status' => false,
        'approved' => false,
        'user_id' => 0,
        'newsletter_id' => 0,
        'payment_method_id' => 0,
        'commission_id' => 0,
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'approved' => 'boolean'
    ];
}
