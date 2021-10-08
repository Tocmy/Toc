<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\FaqRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, FaqRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'faq_group_id', 'tag_id', 'seo_id', 'position', 'status', 'question', 'answer',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'faq_group_id' => 0,
        'tag_id' => 0,
        'seo_id' => 0,
        'position' => 0,
        'status' => NULL,
        'question' => '',
        'answer' => '',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
    ];
}
