@extends('admin.layout')
@section('title', 'Productos')
@section('main')

<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Productos
        <small>Mantenimiento</small>
      </h1>
    </section>
	
	<section class="content container-fluid">
		<div class="row">
			<div class="col-xs-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-product">
                Añadir producto &nbsp; <i class="fa fa-plus"></i>
              </button>
			</div>
		</div>

		<br>
		
		<div class="row">
	        <div class="col-xs-12">
	          <div class="box box-primary">

	            <div class="box-body table-responsive">
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
	              <table class="table table-bordered table-hover">
	              	<thead>
		                <tr>
		                  <th class="text-center"><i class="fa fa-image"></i></th>
		                  <th>Nombre</th>
		                  <th>Estado</th>
		                  <th>Precio (S/.)</th>
		                  <th>Stock</th>
		                  <th>Categoría</th>
		                  <th>Creación</th>
		                  <th>Actualización</th>
		                  <th>Opciones</th>
		                </tr>
	              	</thead>
	              	<tbody>
	              		@foreach($products as $product)
		              		<tr>
		              			<td class="text-center"><img src="{{ $product->featured_image_url }}" alt="" width="70"></td>
		              			<td>{{$product->name}}</td>
		              			@if($product->status)
		              				<td><span class="label label-success">ACTIVO</span></td>
		              			@else
									<td><span class="label label-danger">DESACTIVADO</span></td>
		              			@endif
		              			<td>{{$product->price}}</td>
		              			<td>{{$product->stock}}</td>
		              			<td>{{$product->category->name}}</td>
		              			<td>{{date_format($product->created_at, 'd-m-Y')}}</td>
		              			<td>{{date_format($product->updated_at, 'd-m-Y')}}</td>

		              			<td class="td-actions">
		              				<form method="post" action="{{ route('admin.delete.product', $product) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
			              				<a href="{{route('admin.product.images', $product)}}" title="" class="btn btn-default btn-sm"><i class="fa fa-image"></i></a>
			              				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-product-{{$product->id}}"><i class="fa fa-edit"></i></button>
			              				<button type="submit" title="Eliminar" class="btn btn-danger btn-sm">
			              					<i class="fa fa-times"></i>
			              				</button>
		              				</form>
		              			</td>
		              		</tr>
	              		@endforeach
	              	</tbody>
	              </table>
	            </div>

	            <div class="box-footer clearfix">
					{!! $products->links('admin.includes.pagination') !!}
	            </div>
	           
	          </div>
	        </div>
	    </div>

		<div class="modal fade" id="new-product">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Producto</h4>
              </div>

              <div class="modal-body">

	            <form action="{{route('admin.create.product')}}" role="form" method="post">
				@csrf
					<div class="row">
		              	<div class="col-md-12">
			                <div class="form-group">
			                  <label for="name">Nombre</label>
			                  <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
			                </div>
			                <div class="form-group">
			                  <label for="description">Descripción</label>
			                  <textarea class="form-control" rows="2" id="description" name="description">{{old('description')}}</textarea>
			                </div>
			                <div class="form-group">
			                  <label for="long_description">Detalles</label>
			                  <textarea class="form-control" rows="5" id="long_description" name="long_description">{{old('long_description')}}</textarea>
			                </div>
		              	</div>
		              	<div class="col-md-4">
			                <div class="form-group">
				                <label>
				                  <input type="radio" name="status" value="1" checked>
				                  <span style="margin-right: 10px;">Activar</span>
				                </label>
				                <br>
				                <label>
				                  <input type="radio" name="status" value="0">
				                  Desactivar
				                </label>
				            </div>
		              	</div>
		              	<div class="col-md-4">
		              		<div class="form-group">
			                  <label for="price">Precio</label>
			                  <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}">
			                </div>
		              	</div>
		              	<div class="col-md-4">
		              		<div class="form-group">
			                  <label for="stock">Stock</label>
			                  <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock')}}">
			                </div>
		              	</div>
		                <div class="col-md-12">
			                <div class="form-group">
				                <label for="category_id">Categoría</label>
				                <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
				                  <option selected="selected" disabled>Seleccionar categoría</option>
				                  @foreach($categories as $category)
				                  	<option value="{{$category->id}}">{{$category->name}}</option>
				                  @endforeach
				                </select>
				            </div>
		                </div>
					</div>
              </div>
               	
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

		      </form>

            </div>
          </div>
        </div>

        @foreach($products as $product)
			<div class="modal fade" id="edit-product-{{$product->id}}">
	          <div class="modal-dialog">
	            <div class="modal-content">

	              <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Editar Producto</h4>
	              </div>

	              <div class="modal-body">
					
		            <form action="{{route('admin.update.product', $product)}}" role="form" method="post" enctype='multipart/form-data'>
					@csrf {{method_field('PUT')}}
		              
		                <div class="row">
			              	<div class="col-md-12">
				                <div class="form-group">
				                  <label for="name">Nombre</label>
				                  <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
				                </div>
				                <div class="form-group">
				                  <label for="description">Descripción</label>
				                  <textarea class="form-control" rows="2" id="description" name="description">{{$product->description}}</textarea>
				                </div>
				                <div class="form-group">
				                  <label for="long_description">Detalles</label>
				                  <textarea class="form-control" rows="5" id="long_description" name="long_description">{{$product->long_description}}</textarea>
				                </div>
			              	</div>
			              	<div class="col-md-4">
				                <div class="form-group">
					                <label>
					                  <input type="radio" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}}>
					                  <span style="margin-right: 10px;">Activar</span>
					                </label>
					                <br>
					                <label>
					                  <input type="radio" name="status" value="0" {{$product->status == 0 ? 'checked' : ''}}>
					                  Desactivar
					                </label>
					            </div>
			              	</div>
			              	<div class="col-md-4">
			              		<div class="form-group">
				                  <label for="price">Precio</label>
				                  <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
				                </div>
			              	</div>
			              	<div class="col-md-4">
			              		<div class="form-group">
				                  <label for="stock">Stock</label>
				                  <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}">
				                </div>
			              	</div>
			                <div class="col-md-12">
				                <div class="form-group">
					                <label for="category_id">Categoría</label>
					                <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
					                  @foreach($categories as $category)
					                  	<option value="{{$category->id}}" 
					                  		{{$category->id == $product->category->id ? 'selected="selected"' : ''}}>
					                  		{{$category->name}}
					                  	</option>
					                  @endforeach
					                </select>
					            </div>
			                </div>
						</div>

	              </div>
	               	

	              <div class="modal-footer">
	                <button type="submit" class="btn btn-danger">Guardar</button>
	              </div>

			      </form>

	            </div>
	          </div>
	        </div>
        @endforeach	    

	</section>

</div>

@endsection

@push('styles')
	<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
@endpush
@push('scripts')
	<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script>
	  $(function () {
	    $('.select2').select2()
	  })
	</script>
@endpush