<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\RatingTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingType extends Model
{
    use HasFactory, RatingTypeRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'rating_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'category_id', 'name', 'position',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'category_id' => 0,
        'name' => '',
        'position' => NULL,
    ];

}
