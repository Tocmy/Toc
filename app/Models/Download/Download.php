<?php

namespace App\Models\Download;

use App\Models\Download\Relationship\DownloadRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download extends Model
{
    use HasFactory, SoftDeletes, DownloadRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'downloads';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'download_group_id', 'is_public', 'is_embedded', 'name',
        'filename', 'extension', 'title', 'description', 'position', 'allow_download_days', 'allow_download_count', 'filepath', 'remaining',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'download_group_id' => 0,
        'is_public' => NULL,
        'is_embedded' => NULL,
        'name' => '',
        'filename' => '',
        'extension' => '',
        'title' => '',
        'description' => '',
        'position' => 0,
        'allow_download_days' => 0,
        'allow_download_count' => 0,
        'filepath' => '',
        'remaining' => '',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'is_public' => 'boolean',
        'is_embedded' => 'boolean',
    ];
}
