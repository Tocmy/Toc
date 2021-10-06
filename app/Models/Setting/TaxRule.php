<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\TaxRuleRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class TaxRule extends Model
{
    use HasFactory, SoftDeletes, TaxRuleRelationship, Sortable;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'tax_rules';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'tax_rate_id', 'tax_id', 'based', 'position',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'tax_rate_id' => 0,
        'tax_id' => 0,
        'based' => '',
        'position' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'position' => 'boolean',
    ];

    protected  $sortable=['position'];

}
