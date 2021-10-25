<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\NewsletterRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use HasFactory, SoftDeletes, NewsletterRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'newsletters';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title', 'content', 'sent', 'status', 'locked', 'header', 'schedule',
        'position', 'unsubscribe', 'unsubscribe_link', 'product_id', 'store_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'title' => '',
        'content' => '',
        'sent' => NULL,
        'status' => false,
        'locked' => false,
        'header' => '',
        'schedule' => NULL,
        'position' => 0,
        'unsubscribe' => '',
        'unsubscribe_link' => '',
        'product_id' => 0,
        'store_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'locked' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'sent', 'schedule',
    ];

}
