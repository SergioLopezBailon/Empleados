<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'email', 'imagen', 'descripcion', 'telefono'];

    public function scopeApellidos($query, $v)
    {
        if (!isset($v)) {
            return $query->where('apellidos', 'like', '%');
        }
        switch ($v) {
            case "%":
                return $query->where('apellidos', 'like', '%');
            case "1":
                return $query->where('apellidos', 'like', 'a%')
                    ->orWhere('apellidos', 'like', 'b%')
                    ->orWhere('apellidos', 'like', 'c%')
                    ->orWhere('apellidos', 'like', 'd%')
                    ->orWhere('apellidos', 'like', 'e%')
                    ->orWhere('apellidos', 'like', 'f%');
            case "2":
                return $query->where('apellidos', 'like', 'g%')
                    ->orWhere('apellidos', 'like', 'h%')
                    ->orWhere('apellidos', 'like', 'i%')
                    ->orWhere('apellidos', 'like', 'j%')
                    ->orWhere('apellidos', 'like', 'k%')
                    ->orWhere('apellidos', 'like', 'l%');
            case "3":
                return $query->where('apellidos', 'like', 'm%')
                    ->orWhere('apellidos', 'like', 'n%')
                    ->orWhere('apellidos', 'like', 'o%')
                    ->orWhere('apellidos', 'like', 'p%')
                    ->orWhere('apellidos', 'like', 'q%');
            case "4":
                return $query->where('apellidos', 'like', 'r%')
                    ->orWhere('apellidos', 'like', 's%')
                    ->orWhere('apellidos', 'like', 't%')
                    ->orWhere('apellidos', 'like', 'u%')
                    ->orWhere('apellidos', 'like', 'v%');
            case "5":
                return $query->where('apellidos', 'like', 'w%')
                    ->orWhere('apellidos', 'like', 'x%')
                    ->orWhere('apellidos', 'like', 'y%')
                    ->orWhere('apellidos', 'like', 'z%');
        }
    }
    public function scopeNombre($query, $v){
        if(!isset($v)){
            return $query->where('nombre', 'like', '%');
        }
        Switch ($v){
            case "%" :
                return $query->where('nombre', 'like', '%');
            case "1" :
                return $query->where('nombre', 'like', 'a%')
                    ->orWhere('nombre', 'like', 'b%')
                    ->orWhere('nombre', 'like', 'c%')
                    ->orWhere('nombre', 'like', 'd%')
                    ->orWhere('nombre', 'like', 'e%')
                    ->orWhere('nombre', 'like', 'f%');
            case "2" :
                return $query->where('apellidos', 'like', 'g%')
                    ->orWhere('nombre', 'like', 'h%')
                    ->orWhere('nombre', 'like', 'i%')
                    ->orWhere('nombre', 'like', 'j%')
                    ->orWhere('nombre', 'like', 'k%')
                    ->orWhere('nombre', 'like', 'l%');
            case "3" :
                return $query->where('nombre', 'like', 'm%')
                    ->orWhere('nombre', 'like', 'n%')
                    ->orWhere('nombre', 'like', 'o%')
                    ->orWhere('nombre', 'like', 'p%')
                    ->orWhere('nombre', 'like', 'q%');
            case "4" :
                return $query->where('nombre', 'like', 'r%')
                    ->orWhere('nombre', 'like', 's%')
                    ->orWhere('nombre', 'like', 't%')
                    ->orWhere('nombre', 'like', 'u%')
                    ->orWhere('nombre', 'like', 'v%');
            case "5" :
                return $query->where('nombre', 'like', 'w%')
                    ->orWhere('nombre', 'like', 'x%')
                    ->orWhere('nombre', 'like', 'y%')
                    ->orWhere('nombre', 'like', 'z%');
        }
    }
}
