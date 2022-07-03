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
        $product = Product::with('getCategory')->where('slug', $id)->first();
        return view('frontend.books.detail', compact('categorylist', 'productlatest', 'product'));
    }

    public function category($id)
    {
        //  $item_detail1 = array(
        //     array(
        //         'id' => 'a1',
        //         'price' => 94000,
        //         'quantity' => 1,
        //         'name' => "Apple"
        //     ),
        // );
        // $item_detail2 = array(
        //     array(
        //         'id' => 'a1',
        //         'price' => 94000,
        //         'quantity' => 1,
        //         'name' => "Apple"
        //     ),
        // );
        //foreach make array
        // foreach ($item_detail1 as $item) {
        //     $item_detail[] = $item;
        // }
        // dd($item_detail);
        // $item_details=array(
        //     $item_detail1,$item_detail2
        // );
        // dd($item_details);
        $categorylist = Category::limit(5)->get();


        $productlatest = Product::latest()->limit(5)->get();
        $category=Category::where('slug', $id)->first();
        $product = Product::where('category_id', $category->id)->paginate(20);
        return view('frontend.books.index', compact('categorylist', 'productlatest', 'product', 'category'));
    }
}
