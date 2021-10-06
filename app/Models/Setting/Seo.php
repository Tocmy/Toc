<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'keyword',
        'referrer',
        'meta_image',
        'canonical',
        'geo_region',
        'geo_position',
        'geo_placename',
        'dcterms_format',
        'dcterms_language',
        'dcterms_identifier',
        'dcterms_relation',
        'dcterms_publisher',
        'dcterms_coverage',
        'dcterms_title',
        'dcterms_subject',
        'dcterms_contributor',
        'dcterms_description',
        'og_locale',
        'og_type',
        'og_url',
        'og_title',
        'og_description',
        'og_image',
        'og_site_name',
        'fb_app_id',
        'twitter_card',
        'twitter_site',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_creator',
        

    ];
}
