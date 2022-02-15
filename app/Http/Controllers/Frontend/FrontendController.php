<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $featured_products = Product::where('trending', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'sliders'));
    }
}
