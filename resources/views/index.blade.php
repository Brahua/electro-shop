@extends('layout')
@section('main')

	<div class="section">
		<div class="container">
			<div class="row">

				@foreach($categories as $category)
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="{{url('img/img-categories/'. $category->image)}}" alt="">
						</div>
						<div class="shop-body">
							<h3>Colección <br> {{$category->name}}</h3>
							<a href="#" class="cta-btn">Comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
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
								<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab1">Camaras</a></li>
								<li><a data-toggle="tab" href="#tab1">Accessorios</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="row">

						<div class="products-tabs">
							<div id="tab1" class="tab-pane active">

								<div class="products-slick" data-nav="#slick-nav-1">
									
									<div class="product">

										<div class="product-img">
											<img src="./img/product01.png" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
												<span class="new">Nuevo</span>
											</div>
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>

									</div>

									<div class="product">

										<div class="product-img">
											<img src="./img/product02.png" alt="">
											<div class="product-label">
												<span class="new">Nuevo</span>
											</div>
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>

									</div>
									
									<div class="product">

										<div class="product-img">
											<img src="./img/product03.png" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
											</div>
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>

									</div>

									<div class="product">

										<div class="product-img">
											<img src="./img/product04.png" alt="">
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>

											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>

									</div>
									
									<div class="product">

										<div class="product-img">
											<img src="./img/product05.png" alt="">
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>

									</div>

								</div>

								<div id="slick-nav-1" class="products-slick-nav"></div>

							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>


	<div id="hot-deal" class="section">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3>02</h3>
									<span>Días</span>
								</div>
							</li>
							<li>
								<div>
									<h3>10</h3>
									<span>Horas</span>
								</div>
							</li>
							<li>
								<div>
									<h3>34</h3>
									<span>Min</span>
								</div>
							</li>
							<li>
								<div>
									<h3>60</h3>
									<span>Seg</span>
								</div>
							</li>
						</ul>

						<h2 class="text-uppercase">Oferta esta semana </h2>
						<p>Hasta 50% de descuento</p>
						<a class="primary-btn cta-btn" href="#">Comprar ahora</a>

					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Más vendidos</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab2">Camaras</a></li>
								<li><a data-toggle="tab" href="#tab2">Accessorios</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="row">

						<div class="products-tabs">
							<div id="tab2" class="tab-pane fade in active">

								<div class="products-slick" data-nav="#slick-nav-2">
									
									<div class="product">
										<div class="product-img">
											<img src="./img/product06.png" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
												<span class="new">NUEVO</span>
											</div>
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>

									<div class="product">
										<div class="product-img">
											<img src="./img/product07.png" alt="">
											<div class="product-label">
												<span class="new">NUEVO</span>
											</div>
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									
									<div class="product">
										<div class="product-img">
											<img src="./img/product08.png" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
											</div>
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									
									<div class="product">
										<div class="product-img">
											<img src="./img/product09.png" alt="">
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									
									<div class="product">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
										</div>

										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>

										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>

								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>

							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

	@include('includes/register')

@endsection



