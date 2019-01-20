@extends('layout')
@section('main')

<div id="breadcrumb" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li class="active"><h4> Resultados de la búsqueda "{{$query}}"</h4></li>
				</ul>
			</div>
		</div>
		<div class="row">
			@if (session('notification'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Guardado!</strong> {{ session('notification') }}
			</div>
			@endif
			@if (session('warning'))
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Aviso!</strong> {{ session('warning') }}
			</div>
			@endif
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">

			<div id="store" class="col-md-12">

				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>
						<label>
							Show:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				
				<div class="row">
					@foreach($products as $product)
					
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{$product->featured_image_url}}" alt="">
								@if($product->discount)
								<div class="product-label">
									<span class="sale">-{{$product->discount}}</span>
								</div>
								@endif
							</div>
							<div class="product-body">
								<p class="product-category">{{$product->category->name}}</p>
								<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
								<h4 class="product-price">S/. {{($product->price - $product->discount)}}
								@if($product->discount)<del class="product-old-price">S/. {{$product->price}}</del>@endif
								</h4>
								
								<div class="product-btns">
									<button type="button" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><a href="{{route('product', $product)}}" style="color: #fff">ver detalles</a></span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<form method="POST" action="{{route('cart', $product)}}">
									@csrf
									<input type="hidden" name="quantity" value="1">
									<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> añadir </button>
								</form>
							</div>
						</div>
					</div>
					
					@endforeach
				</div>
				
				<div class="store-filter clearfix">
					{!! $products->links('includes.pagination') !!}
					
				</div>

			</div>

		</div>
	</div>
</div>
@endsection