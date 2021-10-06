<?php

namespace App\Models\Setting;

use App\Models\Setting\Relationship\StatusRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes, StatusRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'comment',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'comment' => '',
    ];

}
