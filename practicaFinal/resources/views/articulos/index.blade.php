@extends('plantillas.plantilla')
@section('titulo')
AmazonES
@endsection
@section('cabecera')
Articulos Disponibles
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div class="container">
        <a href="{{route('articulos.create')}}" class="btn btn-dark mb-3"><i class="fa fa-plus mr-2"></i>Añadir Articulo</a>
</div>
<table class="table table-striped table-dark mt-3">
    <thead>
      <tr>
        <th scope="col">Detalles</th>
        <th scope="col">Nombre</th>
        <th scope="col">Foto</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
      <tr>
        <th scope="row" class="align-middle">
        <a href="{{route('articulos.show', $articulo)}}" class="btn btn fa fa-info-circle fa-3x"></a>
        </th>
    <td class="align-middle">{{$articulo->nombre}}</td>
    <td>
        <img src="{{asset($articulo->foto)}}" width="90px" height='90px' class="rounded-circle">
    </td>
    <td class="align-middle">{{$articulo->stock}}</td>
    <td class="align-middle">{{$articulo->precio}} €</td>
    <td class="align-middle" style="white-space: nowrap">
            <form name="borrar" method='post' action='{{route('articulos.destroy', $articulo)}}'>
            @csrf
            @method('DELETE')
            <a href='{{route('articulos.edit', $articulo)}}' class="btn btn-warning">Editar</a>
            <button type='submit' class="btn btn-danger" onclick="return confirm('¿Borrar articulo?')">
                Borrar</button>
            </form>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  <div class="text-center">
    <a href="{{route('index')}}" class="btn btn-dark mb-3"><i class="fa fa-home fa-3x"></i></a>      
  </div>
  {{$articulos->appends(Request::except('page'))->links()}}
@endsection