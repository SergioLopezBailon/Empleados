<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StoreEmpleado extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        if(is_uploaded_file($this->imagen)){
            $nombre=time()."_".$this->imagen->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($this->imagen));
            $this->merge([
                'nombre1'=>$nombre
            ]);
        }

        $this->merge([
            'nombre'=>ucwords($this->nombre),
            'apellidos'=>ucwords($this->apellidos),
        ]);
    } 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>['required'],
            'apellidos'=>['required'],
            'mail'=>['required',"unique:empleados,mail,$this->id"],
            'imagen'=>['image'],
            'telefono'=>['required'],
            'descripcion'=>['required'],
            'nombre1'=>['nullable']
        ];
    }

    public function messages(){
        return [
            'nombre.required'=>'El nombre Campo es Obligatorio',
            'apellidos.required'=>'El campo apellido es obligatorio',
            'mail.required'=>'El campo mail es obligatorio',
            'mail.unique'=>'El mail ya existe',
            'imagen.image'=>'El fichero debe ser una imagen',
            'telefono.required'=>'El campo telefono es obligatorio',
            'descripcion.required'=>'El campo descripcion es obligatorio'
        ];
    }
}
