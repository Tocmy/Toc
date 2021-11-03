<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer\Relationship\CustomerRelationship as CustomerRelationship;
use App\Traits\Addressable;
use App\Models\BaseModel;

class Customer extends BaseModel
{
    use HasFactory, softDeletes, CustomerRelationship, Addressable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';
    /**
     * The attributes that are mass assignable.
     * to clear some field
     * @var array
     */
    protected $fillable = [
        'customer_type', 'image', 'designation', 'description', 'ip', 'status', 'approved', 'terms',
         'slug', 'birthday', 'gender', 'customer_group_id', 'payment_method_id', 'store_id', 'user_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'customer_type' => false,
        'image' => NULL,
        'designation' => '',
        'description' => NULL,
        'ip' => '',
        'status' => NULL,
        'approved' => false,
        'terms' => false,
        'slug' => '',
        'birthday' => NULL,
        'gender' => NULL,
        'customer_group_id' => 0,
        'payment_method_id' => 0,
        'store_id' => 0,
        'user_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'customer_type' => 'boolean',
        'status' => 'boolean',
        'approved' => 'boolean',
        'terms' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'birthday',
    ];

    //public function toggleStatus() {
        //$this->status ? $this->status = 0 : $this->status = 1;
    //}

    public function scopeStatus($query, $status)
    {
          if ($status == 'enable') {
              $query->where('enable', 1);
          }elseif ($status == 'disable') {
              $query->where('enable' ,0);
          }
          return $query;

    }
}
