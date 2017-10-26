<?php

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

use App\Jobs\TestJob;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function() {
    return \App\User::all();
});

Route::get('queue', function() {
    dispatch((new TestJob())->delay(Carbon::now()->addSeconds(5)));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
