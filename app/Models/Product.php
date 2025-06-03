<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Product extends Model {
    protected $fillable = [
        'name',
        'brand',
        'category_id',
        'description',
        'price',
        'img_url',
        'is_premium',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function alternatives()
    {
        return $this->belongsToMany(Product::class, 'alternative_relations', 'premium_product_id', 'alternative_product_id');
    }

}
