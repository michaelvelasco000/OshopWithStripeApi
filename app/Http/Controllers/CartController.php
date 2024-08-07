<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CartController extends Controller
{
    public function cart(){
            $carts = Cart::all();
            //if($carts)
            $filteredCarts = [];
            foreach ($carts as $cart) {
                //var_dump($cart->userorderID) ;
                if($cart->userorderID == Auth()->user()->id){
                    $filteredCarts[] = $cart;
                }
             
            }
            return view('cart',  ['carts' => $filteredCarts]);
    }
    // public function create(){
    //     return view('products.create');
    // }
    public function addtocart($id){
        $product = Product::findOrFail($id);
        $data = [
            'productID' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'userorderID' => Auth()->user()->id,
        ];
        $newCart = Cart::create($data);
        return redirect()->back()->with('success', 'Product add to cart successfully');
    }


    public function destroycart(Cart $carts){
        $carts->delete();
        return redirect(route('cart.add'))->with('success','Product Deleted Successfully');
    }
}
