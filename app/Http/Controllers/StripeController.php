<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout()
    {
        return redirect(route('home'));
    }
    public function productname($id){
      
    }
   
    public function session($id)
    { 
        $product = Product::findOrFail($id);
      
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' =>  $product->name ,
                        ],
                        'unit_amount'  => $product->price*100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
        $data = [
            'productID' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'userorderID' => Auth()->user()->id,
        ];
        $newCart = Order::create($data);
        // $cart = Cart::delete($product->id);
        return redirect()->away($session->url);
    }

    public function success()
    {
        return redirect(route('home'));
    }
    public function order()
    {
        $orders = Order::all();
        return view('order',  ['orders' => $orders]);
    }
    public function destroyorder(Order $order)
    {
        $order->delete();
        return redirect(route('order'))->with('success','Ordered Product Deleted Successfully');;
    }
}
