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
use App\Mail\AdminCreated;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'test'], function() {
    Route::get('/', 'TestController@index');
    Route::get('/companies', 'TestController@companies');
    Route::any('/companies/{id}', 'TestController@find')->where(['id'=>'[0-9]+']);
});

Route::get('/facade', function() {

    $instance = Cache::getFacadeRoot();
    var_dump((new ReflectionClass($instance))->name);
    //artisan facade:class
});

Route::get('/cache', function() {
    Cache::set('name', 'lex', 2);
    return Cache::get('name');
});

//Route::get('/test', function() {
//    /** @var Admin $admin */
//    $admin = Admin::find(1);
//    $company = $admin->company;
//    var_dump($company->name);
//});

Route::post('/log', function(Faker\Generator $faker) {
    Log::debug($faker->sentence, ['context', Carbon::now()->toDateTimeString()]);
});
Route::get('/helper', 'HelperController@test');
Route::get('/collect/test', 'CollectController@test');

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
    return User::all();
});

Route::get('/migration/done', function() {
    /** @var User $user */
    $user = User::find(1);
    $user->notify(new \App\Notifications\MigrationDone());
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
