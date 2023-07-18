<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $slider;

    private $category;
    private $product;

    private $search;
    public function __construct(Category $category, Product $product, Slider $slider) {
        $this->category = $category;
        $this->product = $product;
        $this->slider = $slider;
    }

    public function index (Request $request) {
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        $sliders = $this->slider->get();

        $productsSearch = $this->product->where('name', 'LIKE', '%'.$request->search.'%')->get();
        return view('product.search.search', compact('categoryLimited', 'categories', 'productsSearch', 'sliders'));
    }
}
