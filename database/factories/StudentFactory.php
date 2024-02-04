<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'user_type' => 1,
        'student_code' => 'STU' . $faker->randomNumber(5, true),
        'parent_code' => 'PAR' . $faker->randomNumber(5, true),
        'student_name' => $faker->name(),
        'student_class' => $faker->name(),
        'student_division' => $faker->numberBetween(1, 5),
        'student_parent' => $faker->name(),
        'mobile' => $faker->phoneNumber,
        'whatsapp' => $faker->phoneNumber,
        'card_no' => $faker->randomNumber(5, true),
//        'student_id' => $faker->randomNumber(5, true),
        'balance' => 0,
        'email' => $faker->email(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret




    ];
});
