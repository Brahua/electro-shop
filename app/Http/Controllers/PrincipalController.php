<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function getIndex(){

    	$categories = Category::all();
    	return view('index', compact('categories'));

    }
}
