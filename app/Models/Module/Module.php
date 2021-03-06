<?php

namespace App\Models\Module;

use App\Models\Module\Relationship\ModuleRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, softDeletes, ModuleRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'modules';

    /**
     * The attributes that are mass assignable.
     * repeir/xcelenit
     * @var  array
     */
    protected $fillable = [
        'name', 'vendor', 'description', 'version', 'is_paid', 'status',
        'module_type', 'icon', 'update_url', 'author', 'website', 'contact_email',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'vendor' => '',
        'description' => NULL,
        'version' => '',
        'is_paid' => NULL,
        'status' => 1,
        'module_type' => '',
        'icon' => NULL,
        'update_url' => NULL,
        'author' => NULL,
        'website' => NULL,
        'contact_email' => NULL,
    ];

}
