<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Attribute\Relationship\AttributeRelationship;

class Attribute extends Model
{
    use HasFactory, softDeletes, Sortable, AttributeRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'attribute_group_id', 'name', 'position',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'attribute_group_id' => 0,
        'name' => '',
        'position' => 0,
    ];

    public $softable =['position'];


    /**
     * Undocumented function
     *ref Seo\Smart
     * @return void
     */
    public function getActionButtonsAttribute()
    {
        return '
             <div class="btn-group" role="group" aria-label="button group">
                 '. $this->getEditButtonAttribute("edit attribute", "admin.attribute.edit").'
                 '. $this->getDeleteButtonAttribute("delete address", "admin.attribute.destroy").'
             </div>">

        ';
    }

}
