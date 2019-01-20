<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getIndex(Request $request)
    {	
    	$categories = Category::all();
    	$query = $request->input('query');
    	$products = Product::where('name', 'like', "%$query%")->paginate(5);
    	
    	if ($products->count() == 1) {
    		$id = $products->first()->id;
    		return redirect()->route('product', $id);
    	}

    	return view('search')->with(compact('categories','products', 'query'));
    }

    public function getData()
    {
    	$products = Product::pluck('name');
    	return $products;
    }
}
