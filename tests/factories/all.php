<?php

use Illuminate\Support\Facades\Hash;

$factory('App\Models\User',[
    'name'     => $faker->name,
    'email'    => $faker->unique()->safeEmail,
    'password' => Hash::make('password'),
]);

$factory('App\Models\Post', [
    'user_id' => 'factory:App\Models\User',
    'title' => $faker->sentence,
    'body' => $faker->paragraph,
]);
