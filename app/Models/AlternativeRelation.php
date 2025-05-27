<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

Class AlternativeRelation extends Model{

    protected $fillable = [
        'product_id',
        'alternative_id',
    ];

    public function alternatives()
    {
        return $this->hasMany(Product::class, 'alternative_id');
    }
}
