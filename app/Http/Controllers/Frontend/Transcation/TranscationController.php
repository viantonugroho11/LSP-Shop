<?php

namespace App\Http\Controllers\Frontend\Transcation;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transcation;
use App\Models\TranscationCart;
use App\Models\TranscationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Midtrans;
use Midtrans\Snap;
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

    public function sendTranscation($id)
    {

        $tanggal = date('ymd');
        $no = "0000";
        $nourut = Transcation::max('transcation_id');
        $cektanggal = substr($nourut, 0, 6);
        $hasil_urut = $tanggal . $no;
        $hasil = "";
        if ($tanggal == $cektanggal) {
            $hasil = $nourut + 1;
        } else {
            $hasil = $hasil_urut + 1;
        }
        $transcation = Transcation::where('user_id', auth()->user()->id)->where('id','=',$id)->first();
        $transcationsDetail= TranscationDetail::where('transcation_id', $transcation->id)->get();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-SPoujZg8TIYwFQGfYez8_M6H';

        // Uncomment for production environment
        \Midtrans\Config::$isProduction = false;

        // Uncomment to enable sanitization
        \Midtrans\Config::$isSanitized = true;

        // Uncomment to enable 3D-Secure
        \Midtrans\Config::$is3ds = true;

        // Uncomment for production environment
        // Config::$isProduction = true;
        // Config::$isSanitized = Config::$is3ds = true;

        // Required
        $transaction_details = array(
            'order_id' => $hasil,
            'gross_amount' => $transcation->total_price, // no decimal allowed for creditcard
        );
        // Optional
        foreach ($transcationsDetail as $transcationDetail) {
            $items[] = array(
                'id' => $transcationDetail->product_id,
                'price' => $transcationDetail->price,
                'quantity' => $transcationDetail->quantity,
                'name' => $transcationDetail->product->name,
            );
        }



        // $item_details = array(
        //     array(
        //         'id' => 'a1',
        //         'price' => 94000,
        //         'quantity' => 1,
        //         'name' => "Apple"
        //     ),
        // );
        $item_details = $items;
        // Optional
        $customer_details = array(
            'first_name'    => Auth::user()->name,
            'last_name'     => "-",
            'email'         => Auth::user()->email,
            'phone'         => "081122334455",
            // 'billing_address'  => $billing_address,
            // 'shipping_address' => $shipping_address
        );
        // Fill transaction details
        $transaction = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        $snap_token = '';
        try {
            $snap_token = Snap::getSnapToken($transaction);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return json_decode($snap_token);
        // echo "snapToken = " . $snap_token;
    }
}
