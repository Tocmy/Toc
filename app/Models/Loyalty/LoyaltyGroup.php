<?php
namespace App\Models\Loyalty;

use App\Models\Loyalty\Relationship\LoyaltyGroupRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoyaltyGroup extends Model
{
    use HasFactory, SoftDeletes, LoyaltyGroupRelationship;
    /**
    * The table associated with the model.
    *referral point, signup point
    * @var  string
    */
    protected $table = 'loyalty_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'scope', 'scope_id', 'point_ratio', 'bonus_points', 'redeem_ratio',
         'redeem_points', 'points_type', 'points_expires', 'exclude_offer_item',
         'description', 'name', 'status', 'product_id', 'setting_id', 'customer_group_id',
    ];

    /**
    * The model's attributes.
    * scope = customer regu
    * @var  array
    */
    protected $attributes = [
        'scope' => false,
        'scope_id' => NULL,
        'point_ratio' => 0,
        'bonus_points' => 0,
        'redeem_ratio' => 0,
        'redeem_points' => 0,
        'points_type' => '',
        'points_expires' => NULL,
        'exclude_offer_item' => NULL,
        'description' => '',
        'name' => '',
        'status' => NULL,
        'product_id' => 0,
        'setting_id' => 0,
        'customer_group_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'scope' => 'boolean',
        'exclude_offer_item' => 'boolean',
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'points_expires',
    ];


}
