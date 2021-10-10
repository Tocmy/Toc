<?php

namespace App\Models\Insurance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceRule extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'insurance_rules';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'position', 'allow', 'key', 'value', 'required_insurance_amount', 'excluded_free_shipping', 'excluded_gift_voucher', 'excluded_download_product', 'multiple',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'position' => NULL,
        'allow' => '',
        'key' => '',
        'value' => NULL,
        'required_insurance_amount' => false,
        'excluded_free_shipping' => false,
        'excluded_gift_voucher' => false,
        'excluded_download_product' => false,
        'multiple' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'position' => 'boolean',
        'required_insurance_amount' => 'boolean',
        'excluded_free_shipping' => 'boolean',
        'excluded_gift_voucher' => 'boolean',
        'excluded_download_product' => 'boolean',
    ];

}
