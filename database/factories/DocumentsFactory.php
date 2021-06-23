<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Documents;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Documents::class, function (Faker $faker) {
    return [
        //
        'doc_link' => 'soya.jpg',
        'file_type' => $faker->randomElement([".pdf", ".doc", ".jpg"]),
        'name' => $faker->randomElement(["Sales Offer", "NCNDA", "Bill of Lading"]),
    ];
});