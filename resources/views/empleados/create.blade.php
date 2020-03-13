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
<form action="{{route('empleados.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
      </div>
      <div class="form-group col-md-6">
        <label for="Apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
      </div>
    </div>
    <div class="form-group">
      <label for="mail">Mail</label>
      <input type="mail" class="form-control" name="mail" placeholder="E-mail" required>
    </div>
    <div class="form-group">
      <label for="tlf">Telefono</label>
      <input type="number" class="form-control" name="telefono" placeholder="Telefono" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="d">Descripcion</label>
        <textarea name="descripcion" cols="30" rows="5" class="form-control" placeholder="Descripcion"></textarea>
      </div>
      <div class="form-group col-md-4">
        <label for="img">Imagen</label>
        <input type="file" name="imagen" accept="image/*">
      </div>
    </div>
    <input type="submit" class="btn btn-success" value="Crear">
    <input type="reset" class="btn btn-warning" value="Limpiar">
    <a href="{{route('empleados.index')}}" class="btn btn-info">Volver</a>
  </form>
@endsection