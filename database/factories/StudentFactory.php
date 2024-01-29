<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'student_name' => $faker->name(),
        'student_parent' => $faker->name(),
        'student_class' => $faker->name(),
        'student_division' => $faker->numberBetween(1, 5),
        'mobile' => $faker->phoneNumber,
        'whatsapp' => $faker->phoneNumber,
        'card_no' => $faker->randomNumber(5, true),
        'student_id' => $faker->randomNumber(5, true),
        'student_code' => 'STU' . $faker->randomNumber(5, true),
        'parent_code' => 'PAR' . $faker->randomNumber(5, true),
        'balance' => $faker->numberBetween(5, 500),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret




    ];
});
