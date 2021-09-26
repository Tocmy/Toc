<?php

namespace App\Models\Category\Relationship;

/**
 *
 */
trait CategoryRelationship
{
    public function meta() {
        return $this->belongsTo(\App\Models\Setting\Meta::class, 'meta_id', 'id');
    }

    public function category() {
        return $this->belongsTo(\App\Models\Category\Category::class, 'parent_id', 'id');
    }

    public function tag() {
        return $this->belongsTo(\App\Models\Setting\Tag::class, 'tag_id', 'id');
    }

    public function articles() {
        return $this->belongsToMany(\App\Models\Article\Article::class, 'article_topic', 'topic_id', 'article_id');
    }

    public function combos() {
        return $this->belongsToMany(\App\Models\Product\Combo::class, 'combo_category', 'category_id', 'combo_id');
    }

    public function products() {
        return $this->belongsToMany(\App\Models\product\Product::class, 'product_category', 'category_id', 'product_id');
    }

    public function services() {
        return $this->belongsToMany(\App\Models\Service\Service::class, 'service_category', 'category_id', 'service_id');
    }

    public function categories() {
        return $this->hasMany(\App\Models\Category\Category::class, 'parent_id', 'id');
    }

    public function ratingTypes() {
        return $this->hasMany(\App\Models\Product\RatingType::class, 'category_id', 'id');
    }

    public function restricts() {
        return $this->hasMany(\App\Models\Coupon\Restrict::class, 'category_id', 'id');

    }

    public function warrantyProducts() {
        return $this->hasMany(\App\Models\Warranty\WarrantyProduct::class, 'category_id', 'id');
    }
}

