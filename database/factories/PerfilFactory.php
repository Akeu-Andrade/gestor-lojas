<?php

/** @var Factory $factory */

use App\Business\Seguranca\Models\Perfil;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Perfil::class, function (Faker $faker) {

    $perfil = array(
        array('nome' => 'Full'),
        array('nome' => 'Admin2')
    );

    $key = random_int(0, (sizeof($perfil)-1));

    return [
        'nome' => $perfil[$key]['nome'],
        'actions' => json_encode([]),
        'actions_api' => json_encode([]),
        'reports' => json_encode([]),
    ];
});
