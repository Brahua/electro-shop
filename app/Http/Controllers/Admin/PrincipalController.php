<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class PrincipalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {

    	$categories = Category::all();

    	return view('admin.index', compact('categories'));

    }
}
