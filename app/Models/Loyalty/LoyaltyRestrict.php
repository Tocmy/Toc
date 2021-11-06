<?php

namespace App\Models\Loyalty;

use App\Models\Loyalty\Relationship\LoyaltyRestrictRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyRestrict extends Model
{
    use HasFactory, LoyaltyRestrictRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'loyalty_restricts';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'is_restrict', 'exclude', 'loyalty_group_id', 'restrict_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'is_restrict' => false,
        'exclude' => NULL,
        'loyalty_group_id' => 0,
        'restrict_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'is_restrict' => 'boolean',
    ];
}
