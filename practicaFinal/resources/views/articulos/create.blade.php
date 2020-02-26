@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    Nuevo Artículo
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
    <div class="card-header text-center text-dark h3">Guardar Artículo</div>
    <div class="card-body">
        <form name="g" action="{{route('articulos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nom" required>
                </div>
                <div class="col">
                    <label for="stock" class="col-form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" placeholder="Stock" id="stock" min="1" step="1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="precio" class="col-form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" placeholder="Precio(€)" id="precio" min="1" step="0.01" required>
                </div>
                <div class="col">
                    <label for="foto" class="col-form-label">Foto</label>
                    <input type="file" class="form-control p-1" name="foto" accept="image/*" id="foto">
                </div>
            </div>
            <div class="form-row text-center">
                <div class="col">
                    <label for="detalles" class="col-form-label">Detalles</label><br>
                    <textarea style="resize: none" name="detalles" id="detalles" cols="90" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row text-center mt-3">
                <div class="col">
                    <input type="submit" value="Crear" class="btn btn-success mr-2">
                    <input type="reset" value="Limpiar" class="btn btn-warning mr-2 ml-2">
                    <a href="{{route('articulos.index')}}" class="btn btn-danger ml-2">Volver</a>
                </div>
            </div>
        </form>
    </div> 
</div>
@endsection