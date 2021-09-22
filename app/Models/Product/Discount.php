<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 'type_id', 'setting_id', 'amount', 'min_range', 'max_range', 'percentage', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

}
