@extends('plantillas.plantilla')
@section('titulo')
    Empleados 
@endsection
@section('cabecera')
    Empleados Disponibles
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $miError)
        <li><p class="text-center">{{$miError}}</p></li>
        @endforeach
      </ul>
    </div>
@endif
<form action="{{route('empleados.update',$empleado)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$empleado->nombre}}" required>
      </div>
      <div class="form-group col-md-6">
        <label for="Apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" value="{{$empleado->apellidos}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="mail">Mail</label>
      <input type="mail" class="form-control" name="mail" value="{{$empleado->mail}}" required>
    </div>
    <div class="form-group">
      <label for="tlf">Telefono</label>
      <input type="text" class="form-control" name="telefono" value="{{$empleado->telefono}}" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="d">Descripcion</label>
        <textarea name="descripcion" cols="30" rows="5" class="form-control">{{$empleado->descripcion}}</textarea>
      </div>
      <div class="form-group col-md-4">
        <label for="img">Imagen</label>
        <img src="{{asset("img/".$empleado->imagen)}}" width="50px" height="50px" class="rounded-circle">
        <input type="file" name="imagen" accept="image/*">
      </div>
    </div>
    <input type="submit" class="btn btn-success" value="Editar">
    <a href="{{route('empleados.index')}}" class="btn btn-info">Volver</a>
  </form>
@endsection