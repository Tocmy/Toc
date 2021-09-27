<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company\Relationship\CompanyRelationship as CompanyRelationship;

class Company extends Model
{
    use HasFactory, softDeletes, CompanyRelationship;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'deleted_at', 'name', 'owner', 'website_name','url', 'ssl', 'slogan', 'logo', 'icon', 'theme', 'twitter', 'twitter', 'facebook', 'google_plus', 'facebook_app_id',
        'google_maps_key_api',
        'email', 'sales_email', 'support_email', 'position', 'address_id', 'setting_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}
