<?php

namespace App\Providers;
use App\Task;
use App\Observers\TaskObserver;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
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
        Task::observe(TaskObserver::class);
    }
}
