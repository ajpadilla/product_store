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
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Store\Product\Product::class, function (Faker\Generator $faker) {
    return [
       'name' => $faker->word, 
       'description' => $faker->text($maxNbChars = 50), 
       'quantity' => $faker->numberBetween($min = 1, $max = 100), 
       'price' => $faker->randomFloat($nbMaxDecimals = 6, $min = 1, $max = 1000), 
       'active' => rand(0, 1), 
       'mark' => $faker->word, 
       'classification_id' => rand(1, 10), 
       'user_id' => rand(1, 10)
    ];
});