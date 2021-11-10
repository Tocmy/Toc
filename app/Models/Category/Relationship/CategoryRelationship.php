<?php

namespace App\Models\Category\Relationship;

use App\Models\Category\Category;
use App\Models\Marketing\RatingType;
use App\Models\Marketing\Restrict;
use App\Models\Product\Combo;
use App\Models\Product\Product;
use App\Models\Service\Service;
use App\Models\Warranty\WarrantyProduct;
use Illuminate\Database\Eloquent\Relations\{BelongsTo,HasMany};

/**
 *
 */
trait CategoryRelationship
{
    /**
     * Get all of the comments for the CategoryRelationship
     *
     * @return \
     */
    public function topics(): HasMany
    {
        return $this->hasMany(ArticleTopic::class, 'topic_id', 'id');
    }

    public function childrens(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function combos(): HasMany
    {
        return $this->hasMany(Combo::class, 'category_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function ratingTypes(): HasMany
    {
        return $this->hasMany(RatingType::class, 'category_id', 'id');
    }

    public function restricts(): HasMany
    {
        return $this->hasMany(Restrict::class, 'category_id', 'id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

    public function warrantyProducts(): HasMany
    {
        return $this->hasMany(WarrantyProduct::class, 'category_id', 'id');
    }

    /**
     * Get the user that owns the CategoryRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
