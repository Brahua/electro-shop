@extends('admin.layout')
@section('title', 'Imagenes de ' . $product->name)
@section('main')

<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Imágenes de {{strtoupper($product->name)}}
        <small>Mantenimiento</small>
      </h1>
    </section>
	
	<section class="content container-fluid">
		<div class="row">
			<div class="col-xs-12">
                <a href="{{route('admin.products')}}" class="btn btn-default">Volver al listado de productos &nbsp; <i class="fa fa-reply"></i></a>
			</div>
		</div>

		<br>
		
		<div class="row">
	        <div class="col-xs-12">
	          <div class="box box-primary">

	            <div class="box-body">
	              	<form method="post" action="{{route('admin.product.save.image', $product)}}" enctype="multipart/form-data">
		                @csrf
		                <input type="file" name="image" required>
		                <br>    
						<button type="submit" class="btn btn-primary">
			                Añadir imagen &nbsp; <i class="fa fa-plus"></i>
			            </button>
		            </form>
	            </div>
	           
	          </div>
	        </div>

	        <div class="col-xs-12">
	          <div class="box box-primary">

	            <div class="box-body">

	            	@if ($errors->any())
				        <div class="alert alert-danger alert-dismissible">
				          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				          <h4><i class="icon fa fa-ban"></i> Error! </h4>
				            <ul>
				                @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				                @endforeach
				            </ul>
				        </div>
				    @endif
	            	@if (session('notification'))
		                <div class="alert alert-success alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h4><i class="icon fa fa-check"></i> Guardado! </h4>
		                  {{ session('notification') }}
		                </div>
	             	@endif
	             	@if (session('error'))
		                <div class="alert alert-danger alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h4><i class="icon fa fa-times"></i> Error! </h4>
		                  {{ session('error') }}
		                </div>
	             	@endif
	              	<div class="row">
	              		@foreach ($images as $image)
		              		<div class="col-md-3">
		              			<div class="panel panel-default">
                        			<div class="panel-body text-center">
				              			<img src="{{$image->url}}" alt="" width="100%">
				              			<form method="post" action="{{route('admin.product.delete.image', $product)}}">
				                            @csrf {{ method_field('DELETE') }}
				                            @if ($image->featured)
				                                <button type="button" class="btn btn-danger" title="Imagen destacada actualmente">
				                                    <i class="fa fa-heart"></i>
				                                </button>
				                            @else
				                                <a href="{{ url('/admin/products/'.$product->id.'/images/favorite/'.$image->id) }}" class="btn btn-default">
				                                    <i class="fa fa-heart"></i>
				                                </a>
				                            @endif
				                            <hr>
				                            <input type="hidden" name="image_id" value="{{ $image->id }}">
				                            <button type="submit" class="btn btn-danger btn-block">Eliminar imagen &nbsp;<i class="fa fa-trash"></i></button>
				                        </form>
                        			</div>
                        		</div>
		              		</div>
	              		@endforeach
	              	</div>

	            </div>
	           
	          </div>
	        </div>
	    </div>  

	</section>

</div>

@endsection

