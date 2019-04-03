<?php

use App\Model\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->sentence(mt_rand(3, 5)),
        'priority' => $faker->numberBetween(1, 3),
    ];
});
