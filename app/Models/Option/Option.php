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
        'position', 'name', 'comment', 'description', 'type_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'position' => 0,
        'name' => '',
        'comment' => '',
        'description' => '',
        'type_id' => 0,
    ];

    public $softable =['position'];
}
