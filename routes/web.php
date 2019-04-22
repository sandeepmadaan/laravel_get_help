<?php

use App\Mail\WelcomeToLaracast;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','verified'])->group(function() {
    Route::get('/home', 'HomeController@index');
    Route::resource('user', 'UserController');

    Route::get('email', function() {
        Mail::to('sandy@example.com')->send(new WelcomeToLaracast);
    });
    Route::resource('/jobs', 'JobController');
    Route::resource('/proposals', 'ProposalController');
});

