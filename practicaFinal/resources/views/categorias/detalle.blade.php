@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    <p class="font-italic"> {{$categoria->nombre}}</p>
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-info my-3">{{$text}}</p>
@endif
    <span class="clearfix"></span>
    <div class="card text-white bg-dark mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($categoria->nombre)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">{{($categoria->id)}}</h5>
            <p class="card-text">
            <p><b>Nombre:</b> {{$categoria->nombre}}</p>
            <div class="text-center">
                <a href="{{route('categorias.index')}}" class="float-right btn btn-success my-3">Volver</a>           
            </div>
        </div>
    </div>
@endsection