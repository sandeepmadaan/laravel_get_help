<?php

use Faker\Generator as Faker;
use App\User;
use App\Job;

$factory->define(App\Proposal::class, function (Faker $faker) {
    $user = factory(User::class)->create();
    $job = factory(Job::class)->create();
    return [
        'description' => $faker->paragraph,
        'amount_proposed' => 300,
        'user_id' => $user->id,
        'job_id' => $job->id    
    ];
});
