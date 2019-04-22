<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('generate:model {name}', function() {
    $model = $this->argument('name');
    $template = File::get('app/templates/model.txt');
    $compiled = str_replace('{name}', $model, $template);
    File::put("app/{$model}.php", $compiled);
})->describe('Creates a special model');
