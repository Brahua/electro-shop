@extends('layout')
@section('main')
	
	<div class="section">
		<div class="container">
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
				
			<div class="row">
				
				@foreach($categories as $category)
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="{{url('img/img-categories/'. $category->image)}}" alt="">
						</div>
						<div class="shop-body">
							<h3>Colección <br> {{$category->name}}</h3>
							<a href="{{route('category', $category)}}" class="cta-btn">Comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Nuevos productos</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
									<li {{ request()->is('/') ? 'class=active' : '' }}><a data-toggle="tab" href="#tab-products">Todos</a></li>
								@foreach($categories as $category)
									<li {{ request()->is('#tab'.$category->id) ? 'class=active' : '' }}><a data-toggle="tab" href="#tab{{$category->id}}">{{$category->name}}</a></li>
								@endforeach	
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="row">

						<div class="products-tabs">
							<div id="tab-products" class="tab-pane {{ request()->is('/') ? 'active' : '' }}">

								<div class="products-slick" data-nav="#slick-nav-products">

									@foreach($products as $product)
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
											<p class="product-category">{{$category->name}}</p>
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
									@endforeach

								</div>

								<div id="slick-nav-products" class="products-slick-nav"></div>

							</div>
							@foreach($categories as $category)
							<div id="tab{{$category->id}}" class="tab-pane {{ request()->is('#tab'.$category->id) ? 'active' : '' }}">

								<div class="products-slick" data-nav="#slick-nav-{{$category->id}}">

									@foreach($category->products()->latest()->take(5)->get() as $product)
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
											<p class="product-category">{{$category->name}}</p>
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
									@endforeach

								</div>

								<div id="slick-nav-{{$category->id}}" class="products-slick-nav"></div>

							</div>
							@endforeach
							
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>


	@if(!Auth::check())
		@include('includes/register')
	@endif
	
@endsection



