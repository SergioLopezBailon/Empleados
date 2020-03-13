<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpleado;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empleados = Empleado::orderby('id')
        ->nombre($request->nombre)
        ->apellidos($request->apellidos)
        ->paginate(5);
        return view('empleados.index',compact('empleados','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleado $request)
    {
        $datos = $request->validated();
        $empleado = new Empleado();
        $empleado->nombre=ucwords($datos['nombre']);
        $empleado->apellidos=ucwords($datos['apellidos']);
        $empleado->mail=$datos['mail'];
        $empleado->telefono=$datos['telefono'];
        $empleado->descripcion=$datos['descripcion'];

        if(isset($datos['nombre1']))

            $empleado->imagen=$datos['nombre1'];

        $empleado->save();
        return redirect()->route('empleados.index')->with('mensaje','Empleado creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpleado $request, Empleado $empleado)
    {
        $datos = $request->validated();

        $empleado->nombre=ucwords($datos['nombre']);
        $empleado->apellidos=ucwords($datos['apellidos']);
        $empleado->mail=$datos['mail'];
        $empleado->telefono=$datos['telefono'];
        $empleado->descripcion=$datos['descripcion'];
        if(isset($datos['nombre1'])){

            if(basename($datos['nombre1'])){
                unlink($datos['imagen']);
            }
            $empleado->imagen=$datos['nombre1'];

        }
        $empleado->update();
        return redirect()->route('empleados.index')->with('mensaje','Empleado creado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $foto = $empleado->imagen;
        if(basename($foto)!="default.jpg"){
            //unlink($foto);
        }

        $empleado->delete();
        return redirect()->route('empleados.index')->with('mensaje','Empleado borrado Correctamente');
    }
}
