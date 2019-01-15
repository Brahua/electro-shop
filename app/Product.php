<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoría.',
        'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
        'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
        'price.required' => 'Es necesario ingresar el precio del producto.',
        'stock.required' => 'Es necesario ingresar el stock del producto.',
        'category_id.required' => 'Es necesario seleccionar una categoría.',
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:200',
        'price' => 'required',
        'stock' => 'required',
        'category_id' => 'required'
    ];

    // $product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    // $product->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images->where('featured', true)->first();

        if (!$featuredImage)
            $featuredImage = $this->images()->first();

        if ($featuredImage) {
            return $featuredImage->url;
        }

        return '/img/img-products/default.gif';
    }

}
