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
        'image_url',
        'is_premium',
    ];
}
