<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\CountryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Country extends Model
{
    use HasFactory, softDeletes, CountryRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'full_name','capital','citizenship', 'timezone_id',
        'iso_code_2', 'iso_code_3', 'status', 'calling_code',
        'flag', 'eea',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'iso_code_2' => '',
        'iso_code_3' => '',
        'status' => NULL,
        'calling_code' => NULL,
        'name' => '',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function getCountry()
    {
       if ($this->country && ($country = $this->country->name)) {
           return $country;
       }
    }

    public function getCountryNameAttribute()
    {
        if ($this->country) {
            return $this->country->name;
        }
        return '';
    }

    public function getCountryCodeAttribute($digits = 2)
    {
         if(! $this->country)
         return '';
         if ($digits === 3) {
             return $this->country->iso_3166_3;
         }
         return $this->country->iso_code_2;
    }

}
