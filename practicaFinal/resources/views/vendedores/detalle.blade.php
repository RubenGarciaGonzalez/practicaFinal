@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
<p class="font-italic"> {{$vendedore->nombre}} {{$vendedore->apellidos}}</p>
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-info my-3">{{$text}}</p>
@endif
    <span class="clearfix"></span>
    <div class="card text-white bg-dark mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>Vendedor: {{$vendedore->nombre}} {{$vendedore->apellidos}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">ID Vendedor: {{($vendedore->id)}}</h5>
            <p class="card-text">
                <div class="text-center">
                    <img src="{{asset($vendedore->perfil)}}" width="160px" heght="160px" class="rounded-circle mb-2">
                </div>
                <div class="text-center my-3">
                    <p><b>Nombre:</b> {{$vendedore->nombre}} {{$vendedore->apellidos}}</p>
                    <p><b>Edad:</b> {{$vendedore->edad}} años</p>
                    <p><b>Total:</b> {{$vendedore->sumaVentas()}} unids</p>
                    <a href="{{route('vendedores.venta', $vendedore)}}" class="text-center btn btn-info my-3">Gestionar Ventas</a>
                    <a href="{{route('vendedores.verVentas', $vendedore)}}" class="text-center btn btn-danger my-3">Ver Ventas</a>
                    <a href="{{route('vendedores.index')}}" class="text-center btn btn-success my-3">Volver</a>     
                </div>
        </div>
    </div>
@endsection