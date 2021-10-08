<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\FaqGroupRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class FaqGroup extends Model
{
    use HasFactory, FaqGroupRelationship, NestableTrait;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $parent ='parent_id';
    protected $table = 'faq_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'position', 'name', 'status', 'parent_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'position' => 0,
        'name' => '',
        'status' => NULL,
        'parent_id' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];
}
