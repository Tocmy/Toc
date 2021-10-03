<?php

namespace App\Models\Banner;

use App\Models\Banner\Attribute\ImageAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Kyslik\ColumnSortable\Sortable;

class Image extends Model
{
    use HasFactory ,SoftDeletes,  Sortable, ImageAttribute;

    /**
    * The table associated with the model.
    *alokcart -imageable
    *neon->fileupload,
    * @var  string
    */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'link', 'image',  'position',
        'params', 'title', 'description', 'custom_code',
        'status', 'path', 'name', 'extension', 'size',
        'imageable_id','imageable_type',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [

        'link' => '',
        'image' => '',
        'position' => false,
        'params' => '',
        'title' => '',
        'description' => '',
        'custom_code' => '',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'position' => 'boolean',
    ];

    public $sortable = ['position'];

    Public function imageable() :MorphTo  {
        return $this->morphTo();
    }



}
