<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Combo extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'combos';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'discount_number', 'display_details', 'position', 'status', 'override', 'sub_product_qty', 'discount_id', 'subproduct_id', 'product_id', 'category_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'discount_number' => 0,
        'display_details' => false,
        'position' => 0,
        'status' => NULL,
        'override' => false,
        'sub_product_qty' => NULL,
        'discount_id' => 0,
        'subproduct_id' => NULL,
        'product_id' => NULL,
        'category_id' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *datatable -snipe it-;ocation
    * @var  array
    */
    protected $casts = [
        'display_details' => 'boolean',
        'status' => 'boolean',
        'override' => 'boolean',
    ];

    //public static function getComboTree($combos, $subproduct_id =null)
    //{
    //    $op = [];
    //    foreach($combos as $combo)
    //    {
    //        if ($combo['subproduct_id'] == $subproduct_id) {
    //             $op[$combo['id']] =[
    //                   'name'          => $combo['name'],
    //                   'subproduct_id' => $combo['subproduct_id']
    //             ];
    //             $children = Combo::getComboTree($combos, $combo['id']);
    //             if ($children) {
    //                 $op[$combo['id']]['children']= $children;
    //             }
    //        }
    //    }
    //    return $op;
    //}


}
