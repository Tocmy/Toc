<?php

namespace App\Models\Supplier;

use App\Models\Supplier\Relationship\SupplierRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use App\Traits\Addressable;

class Supplier extends BaseModel
{
    use HasFactory, SoftDeletes, SupplierRelationship, Addressable;
    protected $table ='suppliers';
    protected $fillable =[
        'name', 'account', 'public_id', 'private_id', 'contact', 'email', 'url', 'remark', 'image', 'position',
         'status', 'history_id', 'store_id', 'supplier_group_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'account' => '',
        'public_id' => '',
        'private_id' => '',
        'contact' => '',
        'email' => '',
        'url' => '',
        'remark' => '',
        'image' => '',
        'position' => NULL,
        'status' => NULL,
        'history_id' => 0,
        'store_id' => 0,
        'supplier_group_id' => 0,
    ];

    protected $casts = [
        'position' => 'boolean',
        'status' => 'boolean',
    ];
    protected $dates =['deleted_at'];


}
