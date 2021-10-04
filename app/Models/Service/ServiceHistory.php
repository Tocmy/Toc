<?php

namespace App\Models\Service;

use App\Models\Service\Relationship\ServiceHistoryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceHistory extends Model
{
    use HasFactory,SoftDeletes, ServiceHistoryRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'service_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'service_id', 'history_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'service_id' => 0,
        'history_id' => 0,
    ];

}
