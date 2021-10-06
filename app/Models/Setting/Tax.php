<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\TaxRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use HasFactory, SoftDeletes, TaxRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'taxes';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title', 'description',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'title' => '',
        'description' => '',
    ];

}
