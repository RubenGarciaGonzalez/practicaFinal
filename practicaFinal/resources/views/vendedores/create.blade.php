@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    Añadir Vendedor
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
    <div class="card-header text-center text-dark h3">Añadir Vendedor</div>
    <div class="card-body">
        <form name="g" action="{{route('vendedores.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Nombre" id="nom" required>
                </div>
                <div class="col">
                    <label for="apell" class="col-form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="{{old('apellidos')}}" placeholder="Apellidos" id="apell" min="1" step="1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="edad" class="col-form-label">Edad</label>
                    <input type="number" class="form-control" name="edad" value="{{old('edad')}}" placeholder="Edad" id="edad" min="18" step="1" required>
                </div>
            </div>
            <div class="form-row text-center">
                <div class="col">
                    <label for="perfil" class="col-form-label">Foto Perfil</label><br>
                    <input type="file" class="form-control p-1" name="perfil" accept="image/*" id="pefil">
                </div>
            </div>
            <div class="form-row text-center mt-3">
                <div class="col">
                    <input type="submit" value="Crear" class="btn btn-success mr-2">
                    <input type="reset" value="Limpiar" class="btn btn-warning mr-2 ml-2">
                    <a href="{{route('vendedores.index')}}" class="btn btn-danger ml-2">Volver</a>
                </div>
            </div>
        </form>
    </div> 
</div>
@endsection