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

use App\Admin;
use App\Company;
use App\Jobs\TestJob;
use App\Mail\AdminCreated;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redis', function(){
    return Redis::get('name');
});
Route::get('/config/{name?}', function($name = 'app') {
    return config($name);
});
Route::get('mail', function() {
    $admin = factory(Admin::class)->create();
    \Mail::to('649981596@qq.com')->send(new AdminCreated($admin));
});

Route::get('/users', function() {
    return \App\User::all();
});

Route::get('/order/paid', 'OrderController@paid');

Route::get('/company/create', 'CompanyController@create');

Route::get('/admin/company', function() {
//    $admin = Admin::find(4);
//    $company = $admin->company;//select * from companies where admin_id = 4
//    var_dump($company);
//    error:

    //table.companies
    //table.admins.company_id
    $company = Company::find(4);
    $admin = $company->admin;//select * from admins where company_id = 4
    var_dump($admin);
});

Route::get('queue', function() {
    dispatch((new TestJob())->delay(Carbon::now()->addSeconds(1)));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
