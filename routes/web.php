<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Inicio
Route::get('/', 'PrincipalController@getIndex');
//Categorias
Route::get('/category/{category}', 'CategoryController@getIndex')->name('category');
//Producto
Route::get('/product/{product}', 'ProductController@getIndex')->name('product');
//Carrito
Route::post('/cart/{product}', 'CartDetailController@postStore')->name('cart');
Route::delete('/cart/{detail}', 'CartDetailController@postDelete')->name('cart.delete');
Route::get('/verify-cart', 'CartDetailController@getVerifyCart')->name('verify.cart');
Route::get('/cart-detail', 'CartDetailController@getCartDetail')->name('cart.detail');
Route::put('/modify-quantity/{detail}', 'CartDetailController@postModifyQuantity')->name('modify.quantity');
//Pedido
Route::post('/order', 'CartController@postUpdate')->name('order');
//Busqueda
Route::get('/search', 'SearchController@getIndex')->name('search');
Route::get('/products/json', 'SearchController@getData');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {

	Route::get('/', 'PrincipalController@getIndex');
	Route::post('update/{cart}', 'PrincipalController@postUpdateStatusCart')->name('update.status.cart');
	//Categorías
	Route::get('/categories', 'CategoryController@getIndex')->name('admin.categories');
	Route::post('/categories/create', 'CategoryController@postCreate')->name('admin.create.category');
	Route::delete('/categories/delete/{category}', 'CategoryController@postDelete')->name('admin.delete.category');
	Route::put('/categories/update/{category}', 'CategoryController@postUpdate')->name('admin.update.category');
	//Productos
	Route::get('products', 'ProductController@getIndex')->name('admin.products');
	Route::post('/products/create', 'ProductController@postCreate')->name('admin.create.product');
	Route::delete('/products/delete/{product}', 'ProductController@postDelete')->name('admin.delete.product');
	Route::put('/products/update/{product}', 'ProductController@postUpdate')->name('admin.update.product');
	//Imagenes
	Route::get('/products/{product}/images', 'ProductImageController@getIndex')->name('admin.product.images'); 
	Route::post('/products/{product}/images', 'ProductImageController@postSaveImage')->name('admin.product.save.image'); 
	Route::delete('/products/{product}/images', 'ProductImageController@postDestroy')->name('admin.product.delete.image'); 	
	Route::get('/products/{product}/images/favorite/{image}', 'ProductImageController@getFavorite'); 
	
});


Auth::routes();

