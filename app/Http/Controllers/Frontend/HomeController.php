<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AltSubCategory;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $products = Product::get();
        $products_latest = Product::latest()->get();
        $services= Service::get();
        $blogs= Blog::latest()->get();
        return view('frontend.home',get_defined_vars());
    }
}
