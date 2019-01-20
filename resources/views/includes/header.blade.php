	<header>
		<div id="header">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3">
						<div class="header-logo">
							<a href="{{url('/')}}" class="logo">
								<img src="{{asset('img/logo.png')}}" alt="">
							</a>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="header-search">
							<form method="get" action="{{ route('search') }}" style="display: flex; justify-content: center">
								<input name="query" placeholder="¿Qué producto buscas?" id="buscar" class="form-control" style="width: 250px;">
								<button type="submit" class="btn btn-sm" style="background-color: #D10024;"><i class="fa fa-search" style="color:#fff;"></i></button>
							</form>
						</div>
					</div>
					
					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							@if(Auth::check())
								<div>
									<a href="{{ route('logout') }}"
				                       onclick="event.preventDefault();
				                       document.getElementById('logout-form').submit();" class="button">
					                   	<i class="fa fa-circle-o-notch"></i>
					                   	<span>Cerrar sesión</span>
				               		</a>
				               		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                        @csrf
				                    </form>
								</div>

								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
										<div class="qty">{{auth()->user()->cart->details->count()}}</div>
									</a>

									<div class="cart-dropdown">
										@foreach(auth()->user()->cart->details as $detail)
										<div class="cart">
											<div class="product-widget">
												<div class="product-img">
													<img src="{{$detail->product->featured_image_url}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$detail->product->name}}</a></h3>
													<h4 class="product-price"><span class="qty">x {{$detail->quantity}}</span>S/. {{$detail->product->price}}</h4>
												</div>
												<form method="POST" action="{{route('cart.delete', $detail)}}">
													@csrf {{ method_field('DELETE') }}
													<button type="submit" class="delete" style="background-color:red;"><i class="fa fa-times"></i></button>
												</form>
											</div>
										</div>
										@endforeach

										<div class="cart-summary">
											<small>{{auth()->user()->cart->details->count()}} productos seleccionados</small>
											<h5>SUBTOTAL: S/. {{auth()->user()->cart->total}}</h5>
										</div>

										<div class="cart-btns">
											<a href="{{route('cart.detail')}}">Ver carro</a>
											<a href="{{route('verify.cart')}}">Verificar <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
							@else
								<div>
									<a href="{{ route('login') }}" class="button">
					                   	<i class="fa fa-user"></i>
					                   	<span>Ingresar</span>
				               		</a>
								</div>
								
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
										<div class="qty">0</div>
									</a>

									<div class="cart-dropdown">
										<div class="cart-summary">
											<small>0 productos seleccionados</small>
											<h5>SUBTOTAL: S/. 0</h5>
										</div>

										<div class="cart-btns">
											<a href="{{route('cart.detail')}}">Ver carro</a>
											<a href="{{route('verify.cart')}}">Verificar <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
							@endif
							
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</header>