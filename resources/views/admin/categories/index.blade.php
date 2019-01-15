@extends('admin.layout')
@section('title', 'Categorías')
@section('main')

<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Categorías
        <small>Mantenimiento</small>
      </h1>
    </section>
	
	<section class="content container-fluid">
		<div class="row">
			<div class="col-xs-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-category">
                Añadir categoría &nbsp; <i class="fa fa-plus"></i>
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
		                  <th>Descripción</th>
		                  <th>Estado</th>
		                  <th>Creación</th>
		                  <th>Actualización</th>
		                  <th>Opciones</th>
		                </tr>
	              	</thead>
	              	<tbody>
	              		@foreach($categories as $category)
		              		<tr>
		              			<td class="text-center"><img src="{{$category->featured_image_url}}" alt="" width="70"></td>
		              			<td>{{$category->name}}</td>
		              			<td>{{$category->description}}</td>
		              			@if($category->status)
		              				<td><span class="label label-success">ACTIVO</span></td>
		              			@else
									<td><span class="label label-danger">DESACTIVADO</span></td>
		              			@endif
		              			<td>{{date_format($category->created_at, 'd-m-Y')}}</td>
		              			<td>{{date_format($category->updated_at, 'd-m-Y')}}</td>
		              			<td class="td-actions">
		              				<form method="post" action="{{ route('admin.delete.category', $category) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
			              				<a href="" title="" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
			              				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-category-{{$category->id}}"><i class="fa fa-edit"></i></button>
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
					{!! $categories->links('admin.includes.pagination') !!}
	            </div>
	           
	          </div>
	        </div>
	    </div>

	    <div class="modal fade" id="new-category">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Categoría</h4>
              </div>

              <div class="modal-body">

	            <form action="{{route('admin.create.category')}}" role="form" method="post" enctype='multipart/form-data'>
				@csrf
	              
	                <div class="form-group">
	                  <label for="name">Nombre</label>
	                  <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
	                </div>
	                <div class="form-group">
	                  <label for="description">Descripción</label>
	                  <textarea class="form-control" rows="3" id="description" name="description">{{old('description')}}</textarea>
	                </div>
	                <div class="form-group">
		                <label>
		                  <input type="radio" name="status" class="minimal-red" value="1" checked>
		                  <span style="margin-right: 10px;">Activar</span>
		                </label>
		                <label>
		                  <input type="radio" name="status" class="minimal-red" value="0">
		                  Desactivar
		                </label>
		             </div>
	                <div class="form-group">
	                  <label for="image">Subir imagen</label>
	                  <input type="file" id="image" name="image">
	                </div>
		              
              </div>
               	

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

		      </form>

            </div>
          </div>
        </div>
		
		@foreach($categories as $category)
			<div class="modal fade" id="edit-category-{{$category->id}}">
	          <div class="modal-dialog">
	            <div class="modal-content">

	              <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Editar Categoría</h4>
	              </div>

	              <div class="modal-body">
					
		            <form action="{{route('admin.update.category', $category)}}" role="form" method="post" enctype='multipart/form-data'>
					@csrf {{method_field('PUT')}}
		              
		                <div class="form-group">
		                  <label for="name">Nombre</label>
		                  <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
		                </div>
		                <div class="form-group">
		                  <label for="description">Descripción</label>
		                  <textarea class="form-control" rows="3" id="description" name="description">{{$category->description}}</textarea>
		                </div>
		                <div class="form-group">
			                <label>
			                  <input type="radio" name="status" class="minimal-red" value="1" {{$category->status == 1 ? 'checked' : ''}}>
			                  <span style="margin-right: 10px;">Activar</span>
			                </label>
			                <label>
			                  <input type="radio" name="status" class="minimal-red" value="0" {{$category->status == 0 ? 'checked' : ''}}>
			                  Desactivar
			                </label>
			             </div>
		                <div class="form-group">
		                  <label for="image">Subir imagen</label>
		                  <input type="file" id="image" name="image">
						  @if($category->image)
		                  	<p class="help-block">Subir una imagen solo si desea reemplazar la existente.</p>
						  @endif	
		                </div>
			              
	              </div>
	               	

	              <div class="modal-footer">
	                <button type="submit" class="btn btn-primary">Guardar</button>
	              </div>

			      </form>

	            </div>
	          </div>
	        </div>
        @endforeach

	</section>

</div>

@endsection