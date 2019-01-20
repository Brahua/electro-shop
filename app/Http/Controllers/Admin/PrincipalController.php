<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Cart;
use App\Product;

class PrincipalController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getIndex() {

    	$carts = Cart::paginate(10);
    	$products = Product::latest()->take(5)->get();
    	return view('admin.index')->with(compact('carts','products'));

    }

    public function postUpdateStatusCart(Request $request, Cart $cart){

    	$cart->status=$request->status;
    	$cart->save();

    	$notification = 'Se actualizó correctamente el estado del pedido '.$cart->id; 
    	return back()->with(compact('notification'));
    }
}
