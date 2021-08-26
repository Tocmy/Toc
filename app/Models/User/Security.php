<?php

namespace App\Models\User;

use App\Models\User\Attribute\SecurityAttribute;
use App\Models\User\Relationship\SecurityRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory, SecurityRelation, SecurityAttribute;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'securities';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'user_id', 'enable', 'two_factor_recovery_code', 'two_factor_secret',
        'authcount', 'authdate', 'requestdate',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'user_id' => 0,
        'enable' => false,
        'two_factor_secret' => NULL,
        'two_factor_code' => NULL,
        'authcount' => 0,
        'authdate' => NULL,
        'requestdate' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'enable' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'authdate', 'requestdate',
    ];

}
