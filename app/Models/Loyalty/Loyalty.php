<?php
namespace App\Models\Loyalty;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loyalty extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    * multi-vendor [userpoint]
    * @var  string
    */
    protected $table = 'loyalties';

    /**
     * The attributes that are mass assignable.
     *points= total points,
     *pending point=bal points after customer redeem or usage
     * @var  array
     */
    protected $fillable = [
        'customer_id', 'order_id', 'store_id', 'points', 'pending_points', 'points_comment','status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'customer_id' => 0,
        'customer_group_id' => 0,
        'store_id' => 0,
        'points' => 0,
        'pending_points' => 0,
        'points_comment' => '',
        'description' => '',
    ];

}
