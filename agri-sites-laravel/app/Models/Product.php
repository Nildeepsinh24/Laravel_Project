<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'image',
        'original_price',
        'sale_price',
        'rating',
        'description',
        'additional_info',
        'slug',
    ];
}
