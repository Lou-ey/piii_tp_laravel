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
}
