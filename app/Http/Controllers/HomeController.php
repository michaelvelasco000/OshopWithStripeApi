<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            $admin = strtolower($usertype);
            if($usertype == 'user'){
                $products = Product::all();
                return view('dashboard', ['products' => $products]); 
            }
            
            else if($admin == 'admin'){
                $products = Product::all();
                return view('admin.adminhome', ['products' => $products]); 
            }else{
                return redirect()->back();
            }
        }
    
    }    

    public function user()
    {
        return view('admin.user');
    }
    public function cart()
    {
        return view('cart');
    }
}
