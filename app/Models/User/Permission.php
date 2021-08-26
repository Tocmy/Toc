<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;
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

}
