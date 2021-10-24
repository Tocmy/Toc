<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\FaqRelationship;
use App\Traits\Seoable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, FaqRelationship,Seoable;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     *tag
     * @var  array
     */
    protected $fillable = [
        'position', 'status', 'question', 'answer', 'faq_group_id', 'store_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'position' => 0,
        'status' => NULL,
        'question' => '',
        'answer' => '',
        'faq_group_id' => 0,
        'store_id' => 0,
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
