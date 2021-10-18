<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\ReviewRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, ReviewRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'approved', 'ip', 'date_create', 'rating', 'rating_sum', 'rating_count',
        'author', 'title', 'text', 'product_id', 'customer_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'approved' => false,
        'ip' => '',
        'date_create' => NULL,
        'rating' => 0,
        'rating_sum' => 0,
        'rating_count' => 0,
        'author' => '',
        'title' => '',
        'text' => '',
        'product_id' => 0,
        'customer_id' => 0,
    ];


    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'approved' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'date_create',
    ];

    public function getProductNameAttribute()
    {
        return $this->product->name;
    }

    public function getCustomerNameAttribute()
    {
        return $this->customer->name;
    }
}
