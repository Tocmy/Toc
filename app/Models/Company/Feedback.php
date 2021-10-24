<?php

namespace App\Models\Company;

use App\Models\Company\Relationship\FeedbackRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes, FeedbackRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'feedbacks';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'company_name', 'contact', 'status', 'description', 'store_id', 'customer_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'company_name' => '',
        'contact' => '',
        'status' => false,
        'description' => '',
        'store_id' => 0,
        'customer_id' => 0,
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
