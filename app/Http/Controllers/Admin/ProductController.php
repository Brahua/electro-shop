<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function getIndex() {

    	$products = Product::orderBy('name')->paginate(5);
    	$categories = Category::all();

    	return view('admin.products.index', compact('products','categories'));

    }

    public function postCreate(Request $request) {

    	$this->validate($request, Product::$rules, Product::$messages);

    	$product = new Product();
    	$product->name = $request->name; 
    	$product->description = $request->description;
    	$product->long_description = $request->long_description;
    	$product->status = $request->status;
    	$product->price = $request->price;
    	$product->stock = $request->stock;
    	$product->category_id = $request->category_id;
    	$product->save();
    	
        $notification = 'Se guardó correctamente el nuevo producto.';

        return back()->with(compact('notification'));

    }

    public function postDelete(Product $product) {

    	$notification = 'Se eliminó el producto '. $product->name;
    	$product->delete();
		
    	return back()->with(compact('notification'));

    }

    public function postUpdate(Request $request, Product $product) {
        
        $this->validate($request, Product::$rules, Product::$messages);

    	$product->name = $request->name; 
    	$product->description = $request->description;
    	$product->long_description = $request->long_description;
    	$product->status = $request->status;
    	$product->price = $request->price;
    	$product->stock = $request->stock;
    	$product->category_id = $request->category_id;
    	$product->save();
    	
        $notification = 'Se actualizó correctamente el producto.';

        return back()->with(compact('notification'));

    }
}
