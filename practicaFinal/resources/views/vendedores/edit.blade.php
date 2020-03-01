@extends('plantillas.plantilla')
@section('titulo')
    AmazonES
@endsection
@section('cabecera')
    {{$vendedore->nombre}} {{$vendedore->apellidos}}
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
<div class="card-header text-center text-dark h3">Editando Vendedor: {{$vendedore->nombre}} {{$vendedore->apellidos}}</div>
    <div class="card-body"> 
        <form name="g" action="{{route('vendedores.update', $vendedore)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col text-center">
                        <img src="{{asset($vendedore->perfil)}}" width="150px" height="150px" class="rounded-circle mb-1">
                        <input type="file" class="form-control p-1" name="perfil" accept="image/*" id="foto">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$vendedore->nombre}}" id="nom" required>
                </div>
                <div class="col">
                    <label for="apell" class="col-form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="{{$vendedore->apellidos}}" id="apell" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="edad" class="col-form-label">Edad</label>
                    <input type="number" class="form-control" name="edad" value="{{$vendedore->edad}}" id="edad" min="18" step="1" required>
                </div>
                <div class="col">
                        <label for="ventas" class="col-form-label">NºVentas</label>
                        <input type="number" class="form-control" name="num_ventas" value="{{$vendedore->num_ventas}}" id="ventas" min="1" step="1" required>
                </div>
            </div>
            <div class="form-row text-center mt-3">
                <div class="col">
                    <input type="submit" value="Guardar" class="btn btn-success mr-2">
                    <a href="{{route('vendedores.index')}}" class="btn btn-danger ml-2">Volver</a>
                </div>
            </div>
        </form>
    </div> 
</div>
@endsection