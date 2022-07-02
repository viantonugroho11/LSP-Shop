<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categorylist = Category::all();
        $productlatest = Product::latest()->limit(5);
        $productlist = Category::with('getProducts')->get();
        return view('frontend.home.index', compact('categorylist', 'productlatest', 'productlist'));
    }
}
