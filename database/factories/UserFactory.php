<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

    $factory->define(User::class, function (Faker $faker) {
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // パスワードの設定
            'remember_token' => Str::random(10),
        ];
    });
