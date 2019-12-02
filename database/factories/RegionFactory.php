<?php

use Faker\Generator as Faker;
use App\Region;

$factory->define(Region::class, function (Faker $faker) {
    return [
            'name'=>$faker->name
    ];
});
