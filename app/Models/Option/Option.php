<?php

namespace App\Models\Option;

use App\Models\Option\Relationship\OptionRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Option extends Model
{
    use HasFactory, OptionRelationship,Sortable;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'options';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'type_id', 'position', 'name', 'comment', 'description',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'type_id' => 0,
        'position' => 0,
        'name' => '',
        'comment' => '',
        'description' => '',
    ];

    public $softable =['position'];
}
