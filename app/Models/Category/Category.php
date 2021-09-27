<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category\Relationship\CategoryRelationship;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, softDeletes, NodeTrait, CategoryRelationship;


    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'deleted_at',
        'parent_id',
        'images',
        'position',
        'status',
        'seo_id',
        'name',
        'slug',
        'description'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function getMetaTitleAttribute()
    {
        return null !== $this->meta && ! empty($this->meta->title) ? $this->meta->title : $this->title;
    }

    public function getMetaDescriptionAttribute()
    {
        return null !== $this->meta && ! empty($this->meta->description) ? $this->meta->description : $this->summary;
    }

}
