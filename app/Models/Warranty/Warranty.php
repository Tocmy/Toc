<?php

namespace App\Models\Warranty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
use App\Models\Warranty\Relationship\WarrantyRelationship;

class Warranty extends BaseModel
{
    use HasFactory, softDeletes, WarrantyRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warranties';
    /**
     * The attributes that are mass assignable.
     *sitemap supersoft
     * @var array
     */
    protected $fillable = [
        'name', 'duration', 'cover', 'exclude', 'condition', 'type_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'duration' => 0,
        'cover' => '',
        'exclude' => '',
        'condition' => '',
        'type_id' => 0,
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
