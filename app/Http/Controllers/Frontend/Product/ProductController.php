<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $categorylist = Category::limit(5)->get();
        $productlatest = Product::latest()->limit(5)->get();
        $product = Product::find($id);
        return view('frontend.books.detail', compact('categorylist', 'productlatest', 'product'));
    }
    
    public function category($id)
    {
        $categorylist = Category::limit(5)->get();
        $productlatest = Product::latest()->limit(5)->get();
        $category=Category::where('slug', $id)->first();
        $product = Product::where('category_id', $category->id)->paginate(20);
        return view('frontend.books.index', compact('categorylist', 'productlatest', 'product', 'category'));
    }
}
