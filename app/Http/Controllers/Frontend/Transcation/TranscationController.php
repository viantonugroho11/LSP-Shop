<?php

namespace App\Http\Controllers\Frontend\Transcation;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TranscationCart;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TranscationController extends Controller
{
    public function addCart(Request $request,$id)
    {
        $productId = Product::where('slug', $id)->first();
        $product = Product::find($productId->id);
        $cart = TranscationCart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + 1,
            ]);
        } else {
            $cart = TranscationCart::create([
                'id'=>Uuid::uuid4()->toString(),
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        return redirect()->back();
    }
    // {
    //     $product = Product::find($request->id);
    //     $cart = session()->get('cart');
    //     if (!$cart) {
    //         $cart = [
    //             $request->id => [
    //                 'name' => $product->name,
    //                 'quantity' => $request->quantity,
    //                 'price' => $product->price,
    //                 'photo' => $product->photo,
    //             ]
    //         ];
    //         session()->put('cart', $cart);
    //         return response()->json(['success' => true]);
    //     }
    //     if (isset($cart[$request->id])) {
    //         $cart[$request->id]['quantity'] += $request->quantity;
    //         session()->put('cart', $cart);
    //         return response()->json(['success' => true]);
    //     }
    //     $cart[$request->id] = [
    //         'name' => $product->name,
    //         'quantity' => $request->quantity,
    //         'price' => $product->price,
    //         'photo' => $product->photo,
    //     ];
    //     session()->put('cart', $cart);
    //     return response()->json(['success' => true]);
    // }
}
