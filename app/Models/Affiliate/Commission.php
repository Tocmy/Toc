<?php

namespace App\Models\Affiliate;

use App\Models\Affiliate\Relationship\CommissionRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
    use HasFactory, SoftDeletes,CommissionRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'rate', 'date', 'amount', 'name', 'type','status','description'
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'rate' => NULL,
        'date' => NULL,
        'amount' => 0,
        'name' => '',
        'type' => '',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    

}
