<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    private $product;
    private $category;
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index ($id)
    {
        $productItem = $this->product->find($id);
        $productsRecommend = $this->product->where('category_id', $productItem->category_id)->get();
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);


        return view('product.detail.product_detail',  compact('categories', 'categoryLimited', 'productItem', 'productsRecommend'));
    }
}
