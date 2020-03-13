@extends('plantillas.plantilla')
@section('titulo')
    Empleados 
@endsection
@section('cabecera')
    Empleados Disponibles
@endsection
@section('contenido')
<div>
    @if ($mensaje=Session::get('mensaje'))
      <p class="alert alert-success">{{$mensaje}}</p>
    @endif
</div>
<div class="card text-black bg-light mt-5 mx-auto" style="max-width:48rem">
    <div class="card-header">
        <p class='font-weight-bold text-center'> {{"Empleado ".$empleado->id}}</p>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td>
                    <p class="font-weight-bold"> Nombre : {{$empleado->nombre." ".$empleado->apellidos}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="font-weight-bold"> Mail : {{$empleado->mail}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="font-weight-bold"> Descripcion : {{$empleado->descripcion}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="font-weight-bold"> Telefono : {{$empleado->telefono}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="font-weight-bold">Foto: <img src="{{asset("img/".$empleado->imagen)}}" width="150px" height="150px" class="rounded-circle"> </p>
                </td>
            </tr>
        </table>
    </div>
    <div class="card-footer text-center">
        <a href="{{route('empleados.index')}}" class="btn btn-info">Volver</a>
    </div>

@endsection