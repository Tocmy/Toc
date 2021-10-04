<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Service\Relationship\ContractRelationship;

class Contract extends Model
{
    use HasFactory, softDeletes, ContractRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'contracts';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'contract_no',
         'name',
         'is_contract',
         'contract_method',
         'contract_scope',
         'contract_requirement',
         'contract_restrict',
         'contract_start',
         'contract_end',
         'period_id',
         'is_trial',
         'contract_term',
         'contract_service',
         'contract_fee',
         'contract_adhoc',
         'customer_id',
         'company_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'contract_no' => '',
        'name' => '',
        'is_contract' => false,
        'contract_method' => '',
        'contract_scope' => '',
        'contract_requirement' => '',
        'contract_restrict' => '',
        'contract_start' => NULL,
        'contract_end' => NULL,
        'period_id' => 0,
        'is_trial' => false,
        'contract_term' => '',
        'contract_service' => '',
        'contract_fee' => 0,
        'contract_adhoc' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'is_contract' => 'boolean',
        'is_trial' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'contract_start', 'contract_end',
    ];


}
