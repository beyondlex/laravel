<?php

use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        //
        'code'=>$faker->unique()->randomNumber(),
        'name'=>$faker->company,
    ];
});
