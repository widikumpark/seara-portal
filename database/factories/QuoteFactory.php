<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        //
        "number" => generateQuoteNumber(),
        "product_ids" => randomNumbersArrayString($faker),
        "destination_id"=>$faker->numberBetween(1, 100),
        "origin_ids"=>implode(",", $faker->randomElements(["AU","US","JP"])),
        "quantities"=>randomNumbersArrayString($faker, 1, 1000),
        "prices"=>randomNumbersArrayString($faker, 1, 1000),
        "is_order"=>$faker->boolean(),
        "is_paid"=>$faker->boolean(),
        "is_shipped"=>$faker->boolean(),
        "valid"=>$faker->boolean(),
        "commission"=>randomNumbersArrayString($faker, 1, 1000),
        "notify_name"=>$faker->name(),
        "phone"=>$faker->phoneNumber(),
        "email"=>$faker->companyEmail(),
        "address"=>$faker->address(),
        "payment_type"=>$faker->randomElement(["T/T - Bank Transfer", "Escrow"]),
        "payment_method"=>$faker->randomElement(["CIF", "FOB"]),
        "extra_instructions"=>$faker->text(),
        "current_status"=>$faker->randomElement(["Awaiting Payment", "Document Pending", "Awaiting Contract"]),

    ];
});

function randomNumbersArrayString(Faker $faker, $min=0, $max=150)
{
    $numberArray = $faker->randomElements([$faker->numberBetween($min, $max), $faker->numberBetween($min, $max),$faker->numberBetween($min, $max)]);
    return implode(",", $numberArray);
}

function generateQuoteNumber($length = 8)
{
    // return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    return  substr(md5(time() . rand()), 0, 10);
}