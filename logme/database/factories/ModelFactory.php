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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt("test123"),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\ValueType::class, function (Faker\Generator $faker) {
    return [
        'key' => 'time',
        'title' => 'Time',
        'description' => 'were tracking time in minutes'
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->domainWord,
        'description' => $faker->sentence(),
        'value_type_id' => 1,
        'user_id' => 1
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {

    $start = $faker->dateTimeThisMonth;
    $value = $faker->numberBetween(20, 200);
    $end = $start->add(new DateInterval('PT'.$value.'M'));

    return [
        'starttime' => $start,
        'endtime' => $end,
        'value' => $value,
        'comment' => $faker->sentence(),
        'exact' => false,
        'value_type_id' => 1,
        'user_id' => 1,
        'project_id' => 1
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->word,
        'user_id' => 1
    ];
});
