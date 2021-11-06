<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\RatingRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory, RatingRelationship;
    /**
    * The table associated with the model.
    *elast/immersive 2.0
    * @var  string
    */
    protected $table = 'ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_id', 'customer_id', 'review_id', 'rating_type_id', 'rating', 'ip',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'product_id' => 0,
        'customer_id' => 0,
        'review_id' => 0,
        'rating_type_id' => 0,
        'rating' => 0,
        'ip' => '',
    ];

}
