<?php
namespace App\Models\Loyalty;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyStatus extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'loyalty_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'loyalty_id', 'order_id', 'customer_id', 'date', 'points', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'loyalty_id' => 0,
        'order_id' => 0,
        'customer_id' => 0,
        'date' => NULL,
        'points' => 0,
        'status' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'date',
    ];

}
