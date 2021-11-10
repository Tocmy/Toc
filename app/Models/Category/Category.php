<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category\Relationship\CategoryRelationship;
use App\Traits\Seoable;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, softDeletes, NodeTrait, CategoryRelationship,Seoable;


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
        '_lft', '_rgt', 'images', 'position', 'status', 'name', 'slug', 'description', 'parent_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        '_lft' => 0,
        '_rgt' => 0,
        'images' => NULL,
        'position' => 0,
        'status' => NULL,
        'name' => '',
        'slug' => '',
        'description' => '',
        'parent_id' => NULL,
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

    public static function getTree()
    {
        $categories = Category::get()->toTree();
        $traverse   = static function ($categories, $prefix ='') use (&$traverse, &$allCats)
        {
            foreach($categories as $category){
                $allCats[]  = ["name" =>$prefix. ''. $category->name, 'id'=> $category->id];
                $traverse($category->children, $prefix.'-');
            }
            return $allCats;
        };
        return $traverse($categories);
    }

    public static function getList()
    {
        $categories = self::get()->toTree();
        $lists      = '<li class="" data-animation-in="" data-animation-out="">';
        foreach($categories as $category){
            $lists .= self::renderNodeHP($category);
        }
        $lists .="</li>";
        return $lists;
    }

    public static function renderNodeHP($node)
    {
        $list = '<li class="dropdown-item hs-has-sub-menu "><a id="nav-link-pages" class="nav-link g-py-7 g-px-0" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-pages" href="/category/'.$node->slug.'">'.$node->title.'</a>';
        if ($node->children()->count() > 0) {
            $list .= '<ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling animated fadeOut">';
            foreach ($node->children as $child) {
                $list .= self::renderNodeHP($child);
            }
            $list .= "</ul>";
        }
        $list .= "</li>";
        return $list;
    }

}
