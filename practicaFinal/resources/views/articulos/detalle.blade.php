@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    <p class="font-italic"> {{$articulo->nombre}}</p>
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-info my-3">{{$text}}</p>
@endif
    <span class="clearfix"></span>
    <div class="card text-white bg-dark mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($articulo->nombre)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">{{($articulo->id)}}</h5>
            <p class="card-text">
            <div class="float-right"><img src="{{asset($articulo->foto)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Nombre:</b> {{$articulo->nombre}}</p>
            <p><b>Stock:</b> {{$articulo->stock}}</p>
            <p><b>Precio:</b> {{$articulo->precio}} €</p>
            <p><b>Categoria:</b> {{$articulo->categoria->nombre}} </p>
            <label for="detalles"><b>Detalles:</b></label>
            <br>
            <textarea style="resize: none" name="detalles" id="detalles" cols="50" rows="5" readonly>{{$articulo->detalles}}</textarea>
            </p>
            <a href="{{route('articulos.index')}}" class="float-right btn btn-success my-3">Volver</a>           
        </div>
    </div>
@endsection