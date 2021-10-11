<?php

namespace App\Models\Option;

use App\Models\Option\Relationship\OptionValueRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class OptionValue extends Model
{
    use HasFactory, OptionValueRelationship, Sortable;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'option_values';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'option_id', 'image', 'position', 'name',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'option_id' => 0,
        'image' => '',
        'position' => 0,
        'name' => '',
    ];

    public $softable =['position'];

}
