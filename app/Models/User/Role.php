<?php

namespace App\Models\User;

use App\Models\User\Relationship\RoleRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, softDeletes, RoleRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'level', 'status', 'is_locked',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'slug' => '',
        'description' => NULL,
        'level' => 1,
        'status' => NULL,
        'is_locked' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'is_locked' => 'boolean',
    ];

}
