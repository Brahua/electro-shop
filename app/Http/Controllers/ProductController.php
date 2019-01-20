<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndex(Product $product){

		$categories = Category::orderBy('name')->get();
		$products_related = Product::all()->random(4);
    	return view('product')->with(compact('categories','product', 'products_related'));

    }
}
