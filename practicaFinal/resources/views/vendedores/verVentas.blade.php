@extends('plantillas.plantilla')
@section('titulo')
AmazonES
@endsection
@section('cabecera')
Ventas de {{$vendedore->nombre}} {{$vendedore->apellidos}}
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div class="text-center">
    <img src="{{asset($vendedore->perfil)}}" width="120px" height='120px' class="rounded-circle">
</div>
<table class="table text-center table-striped table-dark mt-3">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Fecha de Venta</th>
      </tr>
    </thead>
    <tbody>
        @foreach($vendedore->articulos as $articulo)
      <tr>
        <td class="align-middle"><a href="{{route('articulos.show', $articulo->id)}}">{{$articulo->nombre}}</a></td>
        <td class="align-middle">{{$articulo->pivot->cantidad}}</td>
        <td class="align-middle">{{$articulo->pivot->fecha_venta}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
  <div class="text-center">
    <a href="{{route('vendedores.show', $vendedore)}}" class="btn btn-dark mb-3"><i class="fa fa-undo fa-3x"></i></a>      
    <a href="{{route('index')}}" class="btn btn-dark mb-3"><i class="fa fa-home fa-3x"></i></a>      
  </div>
@endsection