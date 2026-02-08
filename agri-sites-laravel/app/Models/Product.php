<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'category_id',
        'image',
        'original_price',
        'sale_price',
        'rating',
        'description',
        'additional_info',
        'slug',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function categoryRelation()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
