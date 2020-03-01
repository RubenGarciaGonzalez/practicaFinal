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
<div class="card-header text-center text-dark h3">Gestión de Ventas: {{$vendedore->nombre}} {{$vendedore->apellidos}}</div>
    <div class="card-body"> 
        <form name="g" action="{{route('vendedores.ventaCompletada')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$vendedore->id}}" name="vendedor_id">
            <div class="form-row">
                <div class="col text-center">
                    <img src="{{asset($vendedore->perfil)}}" width="150px" height="150px" class="rounded-circle mb-1">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$vendedore->nombre}}" id="nom" readonly>
                </div>
                <div class="col">
                    <label for="apell" class="col-form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="{{$vendedore->apellidos}}" id="apell" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="articulo" class="col-form-label">Articulo a vender:</label>
                    <select name="articulo_id" class="form-control">
                        @foreach ($articulos as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>   
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="cantidad" class="col-form-label">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" placeholder="Cantidad" id="edad" min="1" step="1" required>
                </div>
                <div class="col">
                        <label for="ventas" class="col-form-label">Fecha de Venta</label>
                        <input type="date" class="form-control" name="fecha_venta" placeholder="Fecha de venta" id="ventas" min="1" step="1" required>
                </div>
            </div>
            <div class="form-row text-center mt-3">
                <div class="col">
                    <input type="submit" value="Guardar" class="btn btn-success mr-2">
                    <a href="{{route('vendedores.show', $vendedore)}}" class="btn btn-danger ml-2">Volver</a>
                </div>
            </div>
        </form>
    </div> 
</div>
@endsection