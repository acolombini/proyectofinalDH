<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Faker\Generator as Faker;
use Mmo\Faker\PicsumProvider;


$factory->define(Product::class, function (Faker $faker) {

//$faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));

    return [
        'titulo' => $faker->sentence(3),
        'descripcion' => $faker->sentence(5),
        'precio_unitario' => $faker->numberBetween(1,1000),
        'descuento' => $faker->numberBetween(0, 100),
        'stock' => $faker->numberBetween(0, 500),
        //'poster' => $faker->picsum($dir = 'public/storage/product_poster', 500, 500, false),
        // 'poster' => $faker->image($dir = "public/storage/product_poster", $width = 640, $height = 480, 'sports', false),
        'categoria_id' => $faker->numberBetween(1,10),
        'marca_id' => $faker->numberBetween(1,44)
    ];
});
