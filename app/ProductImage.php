<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // $productImage->product
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    //accessor
    public function getUrlAttribute()
    {
    	return asset('img/img-products/' . $this->product->name . '/' . $this->image);
    }
}
