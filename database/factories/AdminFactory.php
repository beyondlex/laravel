<?php

use Faker\Generator as Faker;

$factory->define(\App\Admin::class, function (Faker $faker) {
    static $password;
    return [
        //
        'name' => $faker->userName,
        'password' => $password ? : $password = bcrypt('secret'),
        'company_id' => function() {
            return factory(\App\Company::class)->create()->id;
        }
    ];
});
