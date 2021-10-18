<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\RatingSummaryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingSummary extends Model
{
    use HasFactory, RatingSummaryRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'rating_summaries';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'product_id', 'rating_type_id', 'rating_sum', 'rating_count', 'rating',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'product_id' => 0,
        'rating_type_id' => 0,
        'rating_sum' => 0,
        'rating_count' => 0,
        'rating' => 0,
    ];
}
