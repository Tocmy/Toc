<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'password_resets';

    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var  bool
    */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'email', 'token',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'email' => '',
        'token' => '',
    ];

    /**
    * Indicates if the model should be timestamped.
    *
    * @var  bool
    */
    public $timestamps = false;
}
