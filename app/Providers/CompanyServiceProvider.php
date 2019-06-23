<?php

namespace App\Providers;
use App\Company;
use App\Observers\CompanyObserver;

use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe(CompanyObserver::class);
    }
}
