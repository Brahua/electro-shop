<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use File;

class ProductImageController extends Controller
{
    public function getIndex(Product $product)
    {

    	$images = $product->images()->get();
    	return view('admin.products.images')->with(compact('product', 'images'));

    }

    public function postSaveImage(Request $request, Product $product)
    {

    	$file = $request->file('image');
    	$path = public_path() . '/img/img-products/' . $product->name;
	    $fileName = uniqid() . $file->getClientOriginalName();
    	$moved = $file->move($path, $fileName);
    	
    	if ($moved) {
	    	$productImage = new ProductImage();
	    	$productImage->image = $fileName;
	    	$productImage->product_id = $product->id;
	    	$productImage->save();

	    	$notification = 'Se guardó la imagen correctamente.'; 
    	}

    	return back()->with(compact('notification'));

    }

    public function postDestroy(Request $request, Product $product)
    {
 
    	$productImage = ProductImage::find($request->image_id);
		$fullPath = public_path() . '/img/img-products/' . $product->name . '/' . $productImage->image;
		$deleted = File::delete($fullPath);

    	if ($deleted) {
    		$productImage->delete();
    		$notification = 'Se eliminó la imagen correctamente.'; 
    	}

    	return back()->with(compact('notification'));
    }

    public function getFavorite($id, $image)
    {

        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();

    }
}
