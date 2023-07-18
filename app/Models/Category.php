<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function categoryChildren() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function productsCategory() 
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
