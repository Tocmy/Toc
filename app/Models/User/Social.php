<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'socials';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'user_id', 'provider', 'provider_id', 'token', 'image',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'user_id' => 0,
        'provider' => '',
        'provider_id' => '',
        'token' => NULL,
        'image' => NULL,
    ];

}
