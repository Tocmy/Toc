<?php

namespace App\Models\Download;

use App\Models\Download\Relationship\DownloadGroupRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloadGroup extends Model
{
    use HasFactory, SoftDeletes, DownloadGroupRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'download_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'position',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'position' => 0,
    ];

}
