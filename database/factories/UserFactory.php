<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $now = now()->firstOfMonth();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'admin' => 1,
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeBetween($startDate = $now, $endDate = 'now', $timezone = null)
    ];
});

$factory->define(App\Profile::class, function (Faker $faker) {
    static $id = 1;
    return [
        'user_id' => $id++,
        'avatar' => 'uploads/users/zoe.jpg',
        'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam provident veritatis excepturi sint quia itaque temporibus vero suscipit aliquam odio reprehenderit ab numquam deleniti ea harum, sunt iusto veniam sed.',
        'facebook' => 'facebook.com', 
        'youtube' => 'youtube.com',
    ];
});
