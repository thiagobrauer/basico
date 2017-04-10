<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
require_once 'vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create();
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Pessoa::class, function ($faker) {
    static $password;

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telefone' => substr($faker->phoneNumber, 0,10),
        'dtnasc' => $faker->date($format='Y-m-d',$max='now'),
    ];
});

$factory->define(App\Produto::class, function ($faker) {
    return [
        'descricao' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
    ];
});
