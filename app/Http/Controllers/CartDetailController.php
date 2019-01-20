<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postStore(Request $request, Product $product)
    {
    	$all_details = CartDetail::all();
        $exist = false;

        foreach ($all_details as $key => $detail) {

            if ($detail->product_id == $product->id) {
               $exist = true;
            } 

        }

        if ($exist) {

            $warning = 'Ya existe este producto en tu carrito de compras.';
            return back()->with(compact('warning')); 

        } else {

            $cartDetail = new CartDetail();
            $cartDetail->cart_id = auth()->user()->cart->id;
            $cartDetail->product_id = $product->id;
            $cartDetail->quantity = $request->quantity;
            $cartDetail->save();

    		$notification = 'El producto se ha añadido a tu carrito de compras exitosamente!';
        	return back()->with(compact('notification'));
        }
    }

    public function postDelete(CartDetail $detail)
    {
    	if ($detail->cart_id == auth()->user()->cart->id)
    		$detail->delete();

    	$notification = 'El producto se ha eliminado del carrito de compras correctamente.';
    	return back()->with(compact('notification'));
    }

    public function getVerifyCart()
    {
        $categories = Category::all();
        return view('verify_cart')->with(compact('categories'));
    }

    public function getCartDetail()
    {
        $categories = Category::all();
        return view('cart_detail')->with(compact('categories'));
    }

    public function postModifyQuantity(Request $request, CartDetail $detail)
    {
        if ($request->quantity <= 0) {
            $warning='La cantidad del producto debe ser, al menos 1.';
            return back()->with(compact('warning'));
        }

        $detail->quantity = $request->quantity;
        $detail->save();
        $notification = 'La cantidad del producto se modificó correctamente.';
        return back()->with(compact('notification'));
    }
}
