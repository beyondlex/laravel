<?php

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //
        'order_no'=>date('Ymd').$faker->bankAccountNumber,
        'user_id'=>1,
        'remark'=>$faker->sentence,
    ];
});
