<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class CustomerGroup extends Model
{
    use HasFactory,SoftDeletes,Sortable;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'customer_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'group_type', 'group_discount', 'description', 'approval',
        'position', 'company_id_display', 'company_id_required', 'tax_id_display',
        'tax_id_required', 'payment_allowed', 'payment_terms', 'shipment_allowed', 'taxes_exempt', 'order_total_allowed', 'setting_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'group_type' => false,
        'group_discount' => false,
        'description' => '',
        'approval' => false,
        'position' => 0,
        'company_id_display' => false,
        'company_id_required' => false,
        'tax_id_display' => false,
        'tax_id_required' => false,
        'payment_allowed' => '',
        'payment_terms' => '',
        'shipment_allowed' => '',
        'taxes_exempt' => '',
        'order_total_allowed' => '',
        'setting_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'group_type' => 'boolean',
        'group_discount' => 'boolean',
        'approval' => 'boolean',
        'company_id_display' => 'boolean',
        'company_id_required' => 'boolean',
        'tax_id_display' => 'boolean',
        'tax_id_required' => 'boolean',
    ];

    protected $sortable = ['position'];

}
