<?php

use App\Models\Admin;
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    static $password;
    return [
        //
        'name' => $faker->userName,
        'password' => $password ? : $password = bcrypt('secret'),
        'company_id' => function() {
            return factory(Company::class)->create()->id;
        }
    ];
});
