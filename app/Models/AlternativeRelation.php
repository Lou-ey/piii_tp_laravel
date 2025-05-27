<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class AlternativeRelation extends Model
{
    protected $fillable = [
        'premium_product_id',
        'alternative_product_id',
    ];

    public function premiumProduct()
    {
        return $this->belongsTo(Product::class, 'premium_product_id');
    }

    public function alternativeProduct()
    {
        return $this->belongsTo(Product::class, 'alternative_product_id');
    }
}
