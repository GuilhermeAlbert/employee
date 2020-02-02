<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Funcionario;
use Faker\Generator as Faker;

$factory->define(Funcionario::class, function (Faker $faker) {
    return [
        'nome'      => $faker->name,
        'imagem'    => "https://www.pngitem.com/pimgs/m/285-2855629_profile-clipart-hd-png-download.png", 
        'email'     => $faker->unique()->safeEmail, 
        'phone'     => "5531999999999", 
        'cargo'     => "Assistente Administrativo", 
        'salario'   => "2500", 
        'genero'    => "masculino", 
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
    ];
});
