<?php

namespace App\Models\Affiliate;

use App\Models\Affiliate\Relationship\AffiliateRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory, AffiliateRelationship;

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
        'id','user_id', 'address_id', 'newsletter_id', 'payment_method_id',
        'lifetime', 'commission_id', 'web', 'code', 'payment', 'tax', 'ip', 'status', 'approved'
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
