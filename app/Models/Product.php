<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;

    // get data category table by category_id in products table
    public function categories () {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // get data product image table by product_id in image product table = product id
    public function productImages () {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
