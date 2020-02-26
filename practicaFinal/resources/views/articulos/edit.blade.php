@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    Editando {{$articulo->nombre}}
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
<div class="card-header text-center text-dark h3">Editando Artículo: {{$articulo->nombre}}</div>
    <div class="card-body">
        <form name="g" action="{{route('articulos.update', $articulo)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col text-center">
                        <img src="{{asset($articulo->foto)}}" width="150px" height="150px" class="rounded-circle mb-1">
                        <input type="file" class="form-control p-1" name="foto" accept="image/*" id="foto">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$articulo->nombre}}" id="nom" required>
                </div>
                <div class="col">
                    <label for="stock" class="col-form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" value="{{$articulo->stock}}" id="stock" min="1" step="1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="precio" class="col-form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" value="{{$articulo->precio}}" id="precio" min="1" step="0.01" required>
                </div>
                <div class="col">
                    <label for="detalles" class="col-form-label">Detalles</label>                    
                    <input type="text" class="form-control" name="detalles" value="{{$articulo->detalles}}" id="detalles" required>
                </div>
            </div>
            <div class="form-row text-center mt-3">
                <div class="col">
                    <input type="submit" value="Guardar" class="btn btn-success mr-2">
                    <a href="{{route('articulos.index')}}" class="btn btn-danger ml-2">Volver</a>
                </div>
            </div>
        </form>
    </div> 
</div>
@endsection