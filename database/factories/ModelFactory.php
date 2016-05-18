<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Store\User\User::class, function (Faker\Generator $faker) {
	$roles = ['admin', 'user'];
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->userName,
        'address' => $faker->address,
        'post_code' => $faker->postcode,
        'country_id' => rand(1, 246),
        'phone' => $faker->phoneNumber ,
        'active' => rand(0, 1),
        'role' =>  $roles[array_rand($roles, 1)],  
        'email' => $faker->safeEmail,
        //'password' => bcrypt(str_random(10)),
        'password' => 'secret',
        'remember_token' => str_random(10),
    ];
});
