<?php

namespace App\Models\Page;

use App\Traits\Seoable;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\BaseModel;
use Kyslik\ColumnSortable\Sortable;

class Page extends BaseModel
{
    use HasFactory, SoftDeletes, Sortable, Seoable, Taggable;
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'pages';

    /**currency/blog
     * The attributes that are mass assignable.
     *amend scheme
     * @var array
     */
    protected $fillable = [
        'position', 'status', 'title', 'description', 'slug', 'page_group_id', 'store_id',
    ];

    protected $attributes = [
        'position' => 0,
        'status' => NULL,
        'title' => '',
        'description' => '',
        'slug' => '',
        'page_group_id' => 0,
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

    public $sortable = ['position'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if (!$this->exists) {
             $this->setUniqueSlug($value, '');
        }
    }

    protected function setUniqueSlug($title, $extra)
    {
        $slug = Str::slug($title. '-'. $extra);
        if (static::whereSlug($slug)->exists()) {
             $this->setUniqueSlug($title, $extra+1);
             return;
        }
        $this->attributes['slug'] = $slug;

    }

}
