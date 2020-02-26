@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    Editando {{$categoria->nombre}}
@endsection
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError)
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card bg-secondary">
<div class="card-header text-center text-dark h3">Editando Categoría: {{$categoria->nombre}}</div>
    <div class="card-body">
        <form name="g" action="{{route('categorias.update', $categoria)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$categoria->nombre}}" id="nom" required>
                </div>
            </div>
            <div class="form-row text-center mt-3">
                <div class="col">
                    <input type="submit" value="Guardar" class="btn btn-success mr-2">
                    <a href="{{route('categorias.index')}}" class="btn btn-danger ml-2">Volver</a>
                </div>
            </div>
        </form>
    </div> 
</div>
@endsection