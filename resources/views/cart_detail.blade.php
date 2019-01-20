@extends('layout')

@section('main')
	<div id="breadcrumb" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li class="active"><h4>Carrito de Compras</h4></li>
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
                
                    <div class="col-md-12">

                        <div class="table-responsive">
						  <table class="table table-bordered table-hover">
						  	<thead>
						  		<tr>
						  			<th style="text-align: center;"><i class="fa fa-image"></i></th>
						  			<th> Nombre </th>
						  			<th> Precio (S/.) </th>
						  			<th> Cantidad </th>
						  			<th> Total </th>
						  			<th style="text-align: center;"> Acciones </th>
						  		</tr>
						  	</thead>
						  	<tbody>
						  		@foreach(auth()->user()->cart->details as $detail)
							  		<tr>
							  			<td style="text-align: center;"><img src="{{$detail->product->featured_image_url}}" alt="" width="80" class="image-responsive"></td>
							  			<td>{{$detail->product->name}}</td>
							  			<td>{{$detail->product->price}}</td>
							  			<td>{{$detail->quantity}}</td>
							  			<td>{{($detail->quantity)*($detail->product->price)}}</td>
							  			<td style="text-align: center;">
							  				<form method="POST" action="{{route('cart.delete', $detail)}}">
												@csrf {{ method_field('DELETE') }}
												<button type="submit" class="btn btn-sm" style="background-color: #D10024;"><i class="fa fa-times" style="color:#fff;"></i></button>
												<button type="button" class="btn btn-sm" style="background-color: #000;" data-toggle="modal" data-target="#modifyQuantity{{$detail->id}}"><i class="fa fa-edit" style="color:#fff;"></i></button>
											</form>
							  			</td>
							  		</tr>
						  		@endforeach
						  	</tbody>
						  	<tfoot>
						  		<tr>
						  			<td colspan="6"><strong>TOTAL: S/. {{auth()->user()->cart->total}}</strong></td>
						  		</tr>
						  	</tfoot>
						  </table>
						</div>

                    </div>
                

            </div>
        </div>
    </div>
	@foreach(auth()->user()->cart->details as $detail)
		<div class="modal fade" id="modifyQuantity{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Modificar cantidad</h4>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action="{{route('modify.quantity', $detail)}}">
		        	@csrf {{ method_field('PUT') }}
		        	<div class="row">
		        		<div class="col-md-12">
						    <input type="number" name="quantity" class="form-control" value="{{$detail->quantity}}" placeholder="Cantidad">
		        		</div>
		        	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-danger">Guardar</button>
		      </div>
		        </form>
		    </div>
		  </div>
		</div>
	@endforeach

@endsection

