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

<a href="{{route('empleados.create')}}" class="btn btn-success mt-5 mb-3">Nuevo Empleado</a>
  <form name="search" method="get" action="{{route('empleados.index')}}" class="form-inline float-right my-5">
    <span class="mr-1"> Apellidos:</span>
    <select name='apellidos' class='form-control mr-2' onchange="this.form.submit()">
        <option value='%'>Todos</option>
        @if($request->apellidos=="1")
            <option value="1" selected>A~F</option>
        @else
            <option value="1">A~F</option>
        @endif
        @if($request->apellidos=="2")
            <option value="2" selected>G~L</option>
        @else
            <option value="2">G~L</option>
        @endif
        @if($request->apellidos=="3")
            <option value="3" selected>M~Q</option>
        @else
            <option value="3">M~Q</option>
        @endif
        @if($request->apellidos=="4")
            <option value="4" selected>R~V</option>
        @else
            <option value="4">R~V</option>
        @endif
        @if($request->apellidos=="5")
            <option value="5" selected>W~Z</option>
        @else
            <option value="5">W~Z</option>
        @endif
    </select>
    <span class="mr-1"> Nombre:</span>
    <select name='nombre' class='form-control mr-2' onchange="this.form.submit()">
      <option value='%'>Todos</option>
      @if($request->nombre=="1")
          <option value="1" selected>A~F</option>
      @else
          <option value="1">A~F</option>
      @endif
      @if($request->nombre=="2")
          <option value="2" selected>G~L</option>
      @else
          <option value="2">G~L</option>
      @endif
      @if($request->nombre=="3")
          <option value="3" selected>M~Q</option>
      @else
          <option value="3">M~Q</option>
      @endif
      @if($request->nombre=="4")
          <option value="4" selected>R~V</option>
      @else
          <option value="4">R~V</option>
      @endif
      @if($request->nombre=="5")
          <option value="5" selected>W~Z</option>
      @else
          <option value="5">W~Z</option>
      @endif
  </select>
    <input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Email</th>
        <th scope="col">Imagen</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $item)
            <tr>
                <th scope="row"><a href="{{route('empleados.show',$item)}}" class="btn btn-primary">Detalles</a></th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->apellidos}}</td>
                <td>{{$item->mail}}</td>
                <td><img src="{{asset("img/".$item->imagen)}}" width="50px" height="50px" class="rounded-circle"></td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->telefono}}</td>
                <td>
                  <form action="{{route('empleados.destroy',$item)}}" method="POST" class="form-inline my-2 my-lg-0">
                    @csrf
                    @method('DELETE')
                    <div class="input-group">
                      <input type="submit" class="form-control btn btn-danger" value="Borrar">
                      <a href="{{route('empleados.edit',$item)}}" class="btn btn-warning ml-2">Edit</a>
                    </div>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$empleados->links()}}
@endsection