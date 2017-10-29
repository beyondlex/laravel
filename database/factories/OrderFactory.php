<?php

use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    return [
        //
        'order_no'=>date('Ymd').$faker->bankAccountNumber,
        'user_id'=>1,
        'remark'=>$faker->sentence,
    ];
});
