<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categorylist = Category::limit(5)->get();
        $productlatest = Product::latest()->limit(5)->get();
        $product = Product::paginate(20);
        return view('frontend.product.index', compact('categorylist', 'productlatest', 'product'));
    }
    public function show($id)
    {
        $categorylist = Category::limit(5)->get();
        $productlatest = Product::latest()->limit(5)->get();
        $product = Product::find($id);
        return view('frontend.product.show', compact('categorylist', 'productlatest', 'product'));
    }
}
