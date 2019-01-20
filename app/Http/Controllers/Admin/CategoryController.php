<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function getIndex() {

    	$categories = Category::orderBy('name')->paginate(2);

    	return view('admin.categories.index', compact('categories'));

    }

    public function postCreate(Request $request) {

    	$this->validate($request, Category::$rules, Category::$messages);

    	$category = new Category();
    	$category->name = $request->name; 
    	$category->description = $request->description;
    	$category->status = $request->status;
    	$category->image = $request->image;

    	if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/img/img-categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            if ($moved) {
                $category->image = $fileName;
                $category->save();
            }
            
            $notification = 'Se guardó correctamente la nueva categoría.';

        } else {
            $error = 'No se pudo guardar la categoría, es necesario subir una imagen.';
        }   


        return back()->with(compact('notification','error'));

    }

    public function postDelete(Category $category) {

		$fullPath = public_path() . '/img/img-categories/'. $category->image;
		$eliminar = File::delete($fullPath);

		if ($eliminar) {
	    	$notification = 'Se eliminó la categoría '. $category->name;
	    	$category->delete();
		} else {
			$notification = 'No se pudo eliminar la categoría.';
		}

    	return back()->with(compact('notification'));

    }

    public function postUpdate(Request $request, Category $category) {
        
        $this->validate($request, Category::$rules, Category::$messages);

        $category->name = $request->name; 
    	$category->description = $request->description;
    	$category->status = $request->status;

        if ($request->hasFile('image')) {
        	$fullPath = public_path() . '/img/img-categories/'. $category->image;
			$eliminar = File::delete($fullPath);

            $file = $request->file('image');
            $path = public_path() . '/img/img-categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            if ($moved) {
                $category->image = $fileName;
            }
        }
        
        $category->save();
        $notification = 'Se actualizó correctamente la categoría.'; 

        return back()->with(compact('notification'));
    }

}
