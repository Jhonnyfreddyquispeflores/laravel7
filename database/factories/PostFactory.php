<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->sentence(),
        'contenido'=>$faker->text(),
        'id_autor'=> App\User::All()->random()
    ];
});
