<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->words(3, true),
        "moq" => $faker->numberBetween(100, 1000),

        "measuring_unit" => "MT",
        "desc" => $faker->text(),
        "specification" => $faker->text(),
        "price" => $faker->numberBetween("100", "3000"),
        // "image_url_1" => $faker->imageUrl($width = 640, $height = 480),
        // "image_url_1" => $faker->imageUrl($width = 640, $height = 480),
        "image_url_1" =>"https://loremflickr.com/500/500/agriculture,sugar,trade/all",
        "image_url_2" => "https://loremflickr.com/500/500/agriculture,sugar,trade/all",
        "origin" => $faker->countryCode(),

    ];
});