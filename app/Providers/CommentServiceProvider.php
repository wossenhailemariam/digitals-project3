<?php

namespace App\Providers;
use App\Comment;
use App\Observers\CommentObserver;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
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
        Comment::observe(CommentObserver::class);
    }
}
