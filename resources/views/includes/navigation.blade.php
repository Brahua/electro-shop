<nav id="navigation">
	<div class="container">
		<div id="responsive-nav">
			<ul class="main-nav nav navbar-nav">
				<li {{request()->is('/') ? 'class=active' : '' }}><a href="{{url('/')}}">Inicio</a></li>
				@if(!Auth::check())
					<li {{request()->is('register*') ? 'class=active' : '' }}><a href="{{route('register')}}">Registro</a></li>
				@endif
				@foreach($categories as $category)
					<li {{request()->is('category/'. $category->id) ? 'class=active' : '' }}><a href="{{route('category', $category)}}">{{$category->name}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</nav>