<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierGroup extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'supplier_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'payment_method_id', 'purchase_method', 'position', 'name', 'description', 'status',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'payment_method_id' => 0,
        'purchase_method' => '',
        'position' => NULL,
        'name' => '',
        'description' => '',
        'status' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    * ref check accounterp
    * @var  array
    */
    protected $casts = [
        'position' => 'boolean',
        'status' => 'boolean',
    ];

    public function getStatusBadgeAttribute()
    {
        if ($this->Enable) {
            return "<div class='badge badge-success'>" .__('Enable'). '</div>';
        }

        return "<div class='badge badge-danger'>" .__('Disable'). '</div>';
    }

    Public function Enable()
    {
        return $this->status == 1;
    }

    public function getDisplayStatusAttribute(): string
    {
        return $this->Enable() ? 'Enable' : 'Disable';
    }


}
