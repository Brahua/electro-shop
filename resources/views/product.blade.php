@extends('layout')
@section('main')
<div id="breadcrumb" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li class="active"><h4>{{$product->name}}</h4></li>
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
			
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					@foreach($product->images as $image)
					<div class="product-preview">
						<img src="{{$image->url}}" alt="">
					</div>
					@endforeach
				</div>
			</div>
			
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					@foreach($product->images as $image)
					<div class="product-preview">
						<img src="{{$image->url}}" alt="">
					</div>
					@endforeach
				</div>
			</div>
			
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{$product->name}}</h2>
					
					<div>
						<h3 class="product-price">S/. {{$product->price}}
						@if($product->discount)<del class="product-old-price">S/. {{$product->price}}</del>@endif
						</h3>
						<span class="product-available">{{$product->stock ? 'En Stock' : 'Agotado'}}</span>
					</div>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

					<div class="add-to-cart">
						<form method="POST" action="{{route('cart', $product)}}">
							@csrf
							<div class="qty-label">
								Cantidad
								<div class="input-number">
									<input type="number" name="quantity" required value="1">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> añadir </button>
						</form>
					</div>

					<ul class="product-links">
						<li>Categoría:</li>
						<li><a href="#">{{$product->category->name}}</a></li>
					</ul>

					<ul class="product-links">
						<li>Share:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-md-12">
				<div id="product-tab">
					
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab">Detalles</a></li>
					</ul>
					
					<div class="tab-content">
						<div id="tab" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
	
</div>

<div class="section">
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Productos relacionados</h3>
				</div>
			</div>
			
			@foreach($products_related as $p)
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{$p->featured_image_url}}" alt="">
						@if($p->discount)
						<div class="product-label">
							<span class="sale">-{{$p->discount}}</span>
						</div>
						@endif
					</div>
					<div class="product-body">
						<p class="product-category">{{$p->category->name}}</p>
						<h3 class="product-name"><a href="#">{{$p->name}}</a></h3>
						<h4 class="product-price">S/. {{$product->price}}
						@if($product->discount)<del class="product-old-price">S/. {{$product->price}}</del>@endif
						</h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button type="button" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><a href="{{route('product', $p)}}" style="color: #fff">ver detalles</a></span></button>
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
	</div>
</div>
@endsection