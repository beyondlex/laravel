<?php

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        //
        'code'=>$faker->unique()->randomNumber(),
        'name'=>$faker->company,
    ];
});
