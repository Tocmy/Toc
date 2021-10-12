<?php

namespace App\Models\Page;

use App\Traits\Seoable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nestable\NestableTrait;
use Kyslik\ColumnSortable\Sortable;

class Page extends Model
{
    use HasFactory, SoftDeletes, NestableTrait, Sortable, Seoable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $parent ='parent_id';
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *amend scheme
     * @var array
     */
    protected $fillable = [
        'id',
        'deleted_at',
        'position',
        'status',
        'title',
        'description',
        'slug',
        'seo_id',
        'page_group_id',
        'customer_group_id',
        'store_id',
        'parent_id',
        'visible',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $sortable = ['position'];



}
