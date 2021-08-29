<?php

namespace App\Models\User;

use App\Models\User\Attribute\PermissionAttribute;
use App\Models\User\Relationship\PermissionRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Permission extends Model
{
    use HasFactory, SoftDeletes,
        PermissionRelationship, PermissionAttribute;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'model',
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
        'model' => NULL,
    ];

    protected $casts = [
        'id'            => 'integer',
        'name'          => 'string',
        'slug'          => 'string',
        'description'   => 'string',
        'model'         => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'deleted_at'    => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;



}
