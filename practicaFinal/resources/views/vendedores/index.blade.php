@extends('plantillas.plantilla')
@section('titulo')
AmazonES
@endsection
@section('cabecera')
Vendedores de AmazonES
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div class="container">
  <a href="{{route('vendedores.create')}}" class="btn btn-dark mb-3"><i class="fa fa-plus mr-2"></i>Añadir Vendedor</a>
</div>
<table class="table text-center table-striped table-dark mt-3">
    <thead>
      <tr>
        <th scope="col">Detalles</th>
        <th scope="col">Nombre</th>
        <th scope="col">Edad</th>
        <th scope="col">Perfil</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($vendedores as $vendedor)
      <tr>
        <th scope="row" class="align-middle">
        <a href="{{route('vendedores.show', $vendedor)}}" class="btn btn fa fa-info-circle fa-3x"></a>
        </th>
    <td class="align-middle">{{$vendedor->nombre}}, {{$vendedor->apellidos}}</td>
    <td class="align-middle">{{$vendedor->edad}}</td>
    <td>
        <img src="{{asset($vendedor->perfil)}}" width="90px" height='90px' class="rounded-circle">
    </td>
    <td class="align-middle" style="white-space: nowrap">
            <form name="borrar" method='post' action='{{route('vendedores.destroy', $vendedor)}}'>
            @csrf
            @method('DELETE')
            <a href='{{route('vendedores.edit', $vendedor)}}' class="btn btn-warning">Editar</a>
            <button type='submit' class="btn btn-danger" onclick="return confirm('¿Borrar vendedor?')">
                Borrar</button>
            </form>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  <div class="text-center my-3">
    <h2 class="font-italic">El vendedor con más ventas es {{$vendedor->masVendido($vendedor)}}</h2>
  </div>
  {{$vendedores->appends(Request::except('page'))->links()}}
  <div class="text-center">
    <a href="{{route('index')}}" class="btn btn-dark mb-3"><i class="fa fa-home fa-3x"></i></a>      
  </div>
@endsection