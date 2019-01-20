@extends('admin.layout')
@section('main')

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Panel de Control
      <small>Dashboard</small>
    </h1>
  </section>

  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">CPU Traffic</span>
            <span class="info-box-number">90<small>%</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">760</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Members</span>
            <span class="info-box-number">2,000</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-8">

        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Últimos pedidos</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
         
          <div class="box-body">
            @if (session('notification'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Guardado! </h4>
                  {{ session('notification') }}
                </div>
            @endif
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Fecha de pedido</th>
                    <th>Fecha de entrega</th>
                    <th>Total (S/.)</th>
                    <th>Estado</th>
                    <th style="text-align: center;">Ver</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($carts as $cart)
                  <tr>
                    <td>{{$cart->id}}</td>
                    <td>{{$cart->user->name}}</td>
                    <td>
                      @if($cart->order_date)
                        {{$cart->order_date}}
                      @else
                        <span class="label label-info">{{strtoupper('En proceso...')}}</span>
                      @endif
                    </td>
                    <td>{{$cart->arrived_date ? $cart->arrived_date : 'Sin entregar'}}</td>
                    <td>{{$cart->total}}</td>
                    <td>
                      @if($cart->status == 'Pendiente')
                        <span class="label label-warning">{{strtoupper($cart->status)}}</span>
                      @elseif($cart->status == 'Activo')
                        <span class="label label-success">{{strtoupper($cart->status)}}</span>
                      @elseif($cart->status == 'Cancelado')
                        <span class="label label-danger">{{strtoupper($cart->status)}}</span>
                      @elseif($cart->status == 'Finalizado')
                        <span class="label label-info">{{strtoupper($cart->status)}}</span> 
                      @endif
                    </td>
                    <td style="text-align: center;">
                      @if($cart->status == 'Activo')
                        <i class="fa fa-clock-o"></i>
                      @else
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#view-{{$cart->id}}"><i class="fa fa-eye"></i></button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="box-footer clearfix">
            {!! $carts->links('admin.includes.pagination') !!}
          </div>
          
        </div>

      </div>

      <div class="col-md-4">

        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Productos reciéntemente añadidos</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              @foreach($products as $product)
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="{{route('admin.product.images', $product)}}" class="product-title">{{$product->name}}
                      <span class="label label-success pull-right">S/. {{$product->price}}</span></a>
                    <span class="product-description">
                          {{$product->description}}
                        </span>
                  </div>
                </li>
              @endforeach     
            </ul>
          </div>
        
          <div class="box-footer text-center">
            <a href="{{route('admin.products')}}" class="uppercase">Ver todos los productos</a>
          </div>
        
        </div>

      </div>
    </div>


    @foreach($carts as $cart)
      <div class="modal fade" id="view-{{$cart->id}}">
            <div class="modal-dialog" style="width: 80%;">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Detalles del Pedido</h4>
                </div>

                <div class="modal-body">
                  
                    <div class="row">
                      <div class="col-md-12">
                        <form method="POST" action="{{route('update.status.cart', $cart)}}" class="form-inline">
                          @csrf
                          <div class="form-group">
                            <label for="status">Cambiar Estado del Pedido &nbsp;&nbsp;</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Activo" {{$cart->status == 'Activo' ? 'selected="selected"' : ''}}>Activo</option>
                                <option value="Pendiente" {{$cart->status == 'Pendiente' ? 'selected="selected"' : ''}}>Pendiente</option>
                                <option value="Cancelado" {{$cart->status == 'Cancelado' ? 'selected="selected"' : ''}}>Cancelado</option>
                                <option value="Finalizado" {{$cart->status == 'Finalizado' ? 'selected="selected"' : ''}}>Finalizado</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                        </form>
                        <section class="invoice">
                          
                          <div class="row">
                            <div class="col-xs-12">
                              <h2 class="page-header">
                                <i class="fa fa-globe"></i> Electro Shop.
                                <small class="pull-right">Date: {{$cart->order_date}}</small>
                              </h2>
                            </div>
                            
                          </div>
                        
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                              De
                              <address>
                                <strong>Electro Shop.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                              </address>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                              Para
                              <address>
                                <strong>{{$cart->user->name}}</strong><br>
                                {{$cart->user->address}}<br>
                                {{$cart->user->city | $cart->user->city}}<br>
                                Phone: {{$cart->user->phone}}<br>
                                Email: {{$cart->user->email}}
                              </address>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                              <b>Nro. Comprobante #007612</b><br>
                              <br>
                              <b>Pedido ID:</b> {{$cart->id}}<br>
                              <b>Fecha de entrega:</b> {{$cart->arrived_date}}<br>
                            </div>
                           
                          </div>
                          
                          <div class="row">
                            <div class="col-xs-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Producto</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($cart->details as $detail)
                                    <tr>
                                      <td>{{$detail->product->name}}</td>
                                      <td>{{$detail->product->description}}</td>
                                      <td>S/. {{$detail->product->price}}</td>
                                      <td>{{$detail->quantity}}</td>
                                      <td>S/. {{($detail->quantity)*($detail->product->price)}}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                       
                          </div>

                          <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                              <p class="lead">Payment Methods:</p>
                              <img src="{{asset('dist/img/credit/visa.png')}}" alt="Visa">
                              <img src="{{asset('dist/img/credit/mastercard.png')}}" alt="Mastercard">
                              <img src="{{asset('dist/img/credit/american-express.png')}}" alt="American Express">
                              <img src="{{asset('dist/img/credit/paypal2.png')}}" alt="Paypal">

                              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                              </p>
                            </div>

                            <div class="col-xs-6">

                              <div class="table-responsive">
                                <table class="table">
                                  <tr>
                                    <th>IGV (18%)</th>
                                    <td>S/. {{$cart->total*0.18}}</td>
                                  </tr>
                                  <tr>
                                    <th>Total:</th>
                                    <td>S/. {{$cart->total}}</td>
                                  </tr>
                                </table>
                              </div>
                            </div>

                          </div>
                        
                          <div class="row no-print">
                            <div class="col-xs-12">
                              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                              <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                              </button>
                              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
                              </button>
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>

                </div>

              </div>
            </div>
          </div>
        @endforeach      
    
  </section>

</div>

@endsection