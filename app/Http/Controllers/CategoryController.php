<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getIndex(Category $category){

    	$categories = Category::orderBy('name')->get();
    	$total_categories =  $category->products()->count();
    	$products = $category->products()->paginate(4);
    	return view('category')->with(compact('categories', 'products', 'total_categories', 'category'));

    }
}
