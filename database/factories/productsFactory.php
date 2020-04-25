<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(3),
        'descripcion' => $faker->sentence(5),
        'precio_unitario' => $faker->numberBetween(1,1000),
        'descuento' => $faker->numberBetween(0, 100),
        'stock' => $faker->numberBetween(0, 500),
        'poster' => $faker->image('public/storage',640,480, null, false),
    ];
});
