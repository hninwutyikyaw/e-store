<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_categories = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'sliders','trending_categories'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.category', compact('categories'));
    }

    public function viewCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->where('status', '0')->get();
        return view('frontend.products.index',compact('category', 'products'));
    }
}
