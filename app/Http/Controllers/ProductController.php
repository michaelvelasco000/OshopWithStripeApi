<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',  ['products' => $products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'userID' => 'required',
        ]);
        // dd($data);
        $newProduct = Product::create($data);
        return redirect(route('products.index'));
    }
    public function add(Product $product , Request $request){
     
        // dd($data);
        $newProduct1 = Cart::create($product);
        return redirect(route('products.index'));
    }
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update( Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
    
            'price' => 'required|numeric',
            'description' => 'nullable',
            'user_id' => 'nullable',
        ]);
        $product->update($data);
        return redirect(route('products.index'))->with('success','Product Update Successfully');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('products.index'))->with('success','Product Deleted Successfully');
    }
}
