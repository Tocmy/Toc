<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer\Relationship\CustomerRelationship as CustomerRelationship;
use App\Traits\Addressable;

class Customer extends Model
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
        'id', 'deleted_at', 'customer_group_id', 'store_id', 'customer_type', 'payment_method_id', 'address_id', 'name', 'first_name',
         'last_name', 'email', 'password', 'remember_token', 'image', 'designation', 'description',  'ip', 'status',
         'approved', 'slug', 'birthday', 'gender','terms'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_type' => 'boolean',
        'status' => 'boolean',
        'approved' => 'boolean',
        'terms' => 'boolean',
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
