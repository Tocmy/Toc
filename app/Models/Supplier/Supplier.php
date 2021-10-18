<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='suppliers';
    protected $fillable =[
        'id',
        'deleted_at',
        'name',
        'account',
        'public_id',
        'private_id',
        'contact',
        'address_id',
        'store_id',
         'email',
         'url',
         'remark',
         'image',
         'position',
         'status',
         'supplier_group_id'
    ];
    protected $dates =['deleted_at'];


}
