<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $slider;

    private $category;
    private $product;
    public function __construct(Category $category, Product $product, Slider $slider) {
        $this->category = $category;
        $this->product = $product;
        $this->slider = $slider;
    }
    public function index ($slug, $id) {

        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        $sliders = $this->slider->get();

        $categoryName = $slug;
        $products = $this->product->where('category_id', $id)->paginate(6);

        return view('product.category.list', compact('categoryLimited', 'categories', 'products', 'sliders', 'categoryName'));
    }
}
