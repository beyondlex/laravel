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
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
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
