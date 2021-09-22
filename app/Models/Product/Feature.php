<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product\Relationship\FeatureRelationship;

class Feature extends Model
{
    use HasFactory, FeatureRelationship, softDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'features';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'deleted_at',
        'product_id',
        'expires_date',
        'status',
        'available'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at','expires_date', 'available',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

}
