
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 0, 999.99),
        'msrp' => $faker->randomFloat(2, 0, 999.99),
        'stock' => $faker->numberBetween(0, 999)
    ];
});
