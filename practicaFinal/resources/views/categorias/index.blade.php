@extends('plantillas.plantilla')
@section('titulo')
AmazonES
@endsection
@section('cabecera')
Categorias Disponibles
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div class="container">
        <a href="{{route('categorias.create')}}" class="btn btn-dark mb-3"><i class="fa fa-plus mr-2"></i>Añadir categoria</a>
</div>
<table class="table table-striped table-dark mt-3">
    <thead>
      <tr>
        <th scope="col">Detalles</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
      <tr>
        <th scope="row" class="align-middle">
        <a href="{{route('categorias.show', $categoria)}}" class="btn btn fa fa-info-circle fa-3x"></a>
        </th>
    <td class="align-middle">{{$categoria->nombre}}</td>
    <td class="align-middle" style="white-space: nowrap">
            <form name="borrar" method='post' action='{{route('categorias.destroy', $categoria)}}'>
            @csrf
            @method('DELETE')
            <a href='{{route('categorias.edit', $categoria)}}' class="btn btn-warning">Editar</a>
            <button type='submit' class="btn btn-danger" onclick="return confirm('¿Borrar categoria?')">
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
  {{$categorias->appends(Request::except('page'))->links()}}
@endsection