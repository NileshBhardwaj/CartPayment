<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;

class CartController extends Controller
{
    //
    public function add_to_cart(Request $request)
    {

        $cart_get = Cart::where('product_id', $request->id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($cart_get) {
            // If the product and user ID already exist in the cart, increase the quantity
            $cart_get->quantity += $request->quantity;
            $cart_get->save();
        } else {
            // If not, create a new entry
            $product = Cart::create([
                'user_id' => $request->user_id,
                'product_id' => $request->id,
                'quantity' => $request->quantity,
            ]);
        }

        $success = "Added to cart";
        return response()->json($success);
    }

    public function user_cart()
    {
        $user = Auth::user()->id;
        $get_cart = Cart::select('carts.*', 'products.price', 'products.name')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('user_id', $user)->get();

        return response()->json($get_cart);

    }

    public function fetch_data(Request $request)
    {
        $order_id = Session::get('id');
     

        //  dd($id); // Outputs: 2G909559AB4355042

        $client_id = 'AY-9F1CQO2vXBFBbGC-9WsT1GFohiKtc25L8U2P_ZObCrkyw1Q0rM6RsNoo1L27xy0R6ow7lYzljYtHr';
        $secret = 'EMIZLR8HMRIy-DMzOGKm5ejXduMkUelz3Gb-mL_sRBV2n7AshPEKreVRp1ozUakJJBJ1ydlcTr3M5epB';

        $encoded_auth = base64_encode($client_id . ':' . $secret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $encoded_auth,
            'Content-Type' => 'application/json',
        ])->get('https://api-m.sandbox.paypal.com/v2/checkout/orders/'.$order_id);

        // You can then use the response() method to get the response data
        $data = $response->json();

        // dd($data);
        return response()->json($data);

        
    }
    public function remove_cart(Request $request)
    {


        
        // $order_id = Session::get('id');
      
        $user = Auth::user()->id;
        $get_cart = Cart::select('carts.*', 'products.price', 'products.name')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('user_id', $user)->get();

        //  dd($get_cart);

        $total_sum = 0;
        $product_ids = [];
        $quantity = [];
        $price = [];
        foreach ($get_cart as $item) {
            $total_sum += $item->quantity * $item->price;
            $product_ids[] = $item->product_id;
            $quantity[] = $item->quantity;
            $price[] = $item->price;

        }
        // dd($quantity);

        $payment_id = Str::Random(10);

        $userId = $user;
        $total = $total_sum;
        $quantity = implode(',', $quantity);
        $productId = implode(',', $product_ids);
        $price = implode(',', $price);

        // dd($quantity);
        $all_order = Order::all()->first();
        // $payment = $all_order->payment_id;

        $exist = Order::where('order_id', $request->order_id)->first();
        // dd($exist);


        if (isset($exist)) {
            // dd($exist);
            return response()->json(['message' => 'Payment already completed']);
        } else {
            $order = Order::create([
                'user_id' => $user,
                'total' => $total,
                'payment_id' => $request->payer_id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price,
                'order_id'=>$request->order_id,
                
                'status' => "paid",
            ]);
        }
        
        $delete_row = Cart::where('user_id', $user)->delete();
        // Session::flush(); 
        return response()->json('message');
    
    }
}
