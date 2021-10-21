<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company\Relationship\CompanyRelationship as CompanyRelationship;
use App\Traits\Addressable;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
    use HasFactory, softDeletes, CompanyRelationship, Addressable,Sortable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';
    protected $softable = ['position'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'owner', 'website_name', 'url', 'ssl', 'slogan', 'logo', 'icon',
        'theme', 'skype', 'twitter', 'facebook', 'instagram', 'facebook_app_id', 'google_maps_key_api',
        'email', 'sales_email', 'support_email', 'position', 'status', 'setting_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'owner' => '',
        'website_name' => '',
        'url' => '',
        'ssl' => '',
        'slogan' => NULL,
        'logo' => NULL,
        'icon' => NULL,
        'theme' => NULL,
        'skype' => NULL,
        'twitter' => NULL,
        'facebook' => NULL,
        'instagram' => NULL,
        'facebook_app_id' => NULL,
        'google_maps_key_api' => NULL,
        'email' => '',
        'sales_email' => '',
        'support_email' => '',
        'position' => 0,
        'status' => false,
        'setting_id' => 0,
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}
