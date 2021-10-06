<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\WeightRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends Model
{
    use HasFactory, SoftDeletes, WeightRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weights';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'deleted_at', 'value', 'title', 'unit', 'is_default'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
