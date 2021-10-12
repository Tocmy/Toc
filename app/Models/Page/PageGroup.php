<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Page\Relationship\PageGroupRelationship;
use Nestable\NestableTrait;

class PageGroup extends Model
{
    use HasFactory, softDeletes, PageGroupRelationship, NestableTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page_groups';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position', 'status', 'title', 'description', 'slug', 'parent_id', 'customer_group_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public static function getAllList()
     {
         return self::orderBy('name')->get()->pluck('name', 'id')->toArray();
     }
}
