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
        'image', 'position', 'name', 'option_id',
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

    public static function checkIfRequired($class, $field)
    {
        $rules = $class::rules();
        foreach ($rules as $rule_name => $rule) {
            if ($rule_name == $field) {
                if (strpos($rule, 'required') === false) {
                    return false;
                } else {
                    return true;
                }

            }
        }
    }

}
