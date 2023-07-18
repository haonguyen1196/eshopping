<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    public function __construct(Slider $slider, Category $category, Product $product) 
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }
    public function index () 
    {
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        $category = $this->category->find(10);
        $categoryChild = $category->categoryChildren;
        $sliders = $this->slider->get();
        $products = $this->product->take(6)->get();
        $productRecommends = $this->product->latest('view_count')->get();
        return view('home.home', compact('sliders','categories', 'products', 'productRecommends', 'categoryChild', 'categoryLimited'));   
    }
}
