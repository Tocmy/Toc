<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Attribute\Relationship\AttributeGroupRelationship;

class AttributeGroup extends Model
{
    use HasFactory, softDeletes, Sortable, AttributeGroupRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'attribute_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'position', 'name',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'position' => 0,
        'name' => '',
    ];

    public $sortable = ['position'];

    public function getNameAttribute($value)
    {
        return __($value);
    }
}
