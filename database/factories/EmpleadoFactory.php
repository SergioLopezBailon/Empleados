<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName(),
        'apellidos'=>$faker->lastName(),
        'mail'=>$faker->unique()->safeEmail,
        'descripcion'=>$faker->text(20),
        'telefono'=>$faker->phoneNumber
    ];
});
