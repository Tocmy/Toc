<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierSetting extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplier_setting';
    /**
     * The attributes that are mass assignable.
     * maybe drop
     * @var array
     */
    protected $fillable = [
        'id',
        'supplier_id',
        'setting_id',
        'setting_title',
        'setting_key',
        'setting_description',
        'setting_value',
        'position'
    ];

}
