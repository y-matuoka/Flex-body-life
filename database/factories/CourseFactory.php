<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'course' => 1,
        'Achievement_date' => Carbon::now()->addDay(7),
    ];
});
