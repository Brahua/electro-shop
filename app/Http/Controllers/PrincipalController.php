<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function getIndex(){

    	$products = Product::latest()->take(5)->get(); 
    	$categories = Category::orderBy('name')->get();
    	return view('index', compact('products','categories'));

    }
}
