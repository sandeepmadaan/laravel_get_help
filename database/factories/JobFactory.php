<?php

use Faker\Generator as Faker;
use App\User;
use App\Category;

$factory->define(App\Job::class, function (Faker $faker) {
    $user = factory(User::class)->create();
    $category = factory(Category::class)->create();
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'budget_start_amount' => 200,
        'budget_end_amount' => 400,
        'user_id' => $user->id,
        'category_id' => $category->id    
    ];
});
