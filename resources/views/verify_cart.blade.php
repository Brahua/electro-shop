@extends('layout')
@section('main')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li class="active"><h4>Confirmar Pedido</h4></li>
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
            <div style="display: flex; justify-content: center;">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('order') }}">
                        @csrf
                        <div class="section-title text-center">
                            <h3 class="title">Tu Pedido</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCTO</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>
                            <div class="order-products">
                                @foreach(auth()->user()->cart->details as $detail)
                                <div class="order-col">
                                    <div>{{$detail->product->name}} <strong>x{{$detail->quantity}}</strong></div>
                                    <div>S/. {{$detail->product->price}}</div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div><strong class="order-total">S/. {{auth()->user()->cart->total}}</strong></div>
                            </div>
                        </div>
                        <center>
                        <button type="submit" class="primary-btn order-submit">Realizar pedido</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection