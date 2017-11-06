<?php

namespace App\Providers;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Eloquent\CompanyRepository;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
//        $this->app->bind(CompanyRepositoryInterface::class, \App\Repositories\Eloquent\Fake\CompanyRepository::class);
    }
}
