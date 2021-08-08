<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\SmsNotification;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Tag',\App\Models\Tag::class);
        $this->app->bind('Post',\App\Models\Post::class);
        $this->app->bind('Group',\App\Models\Group::class);
        $this->app->bind('PostRepository', \App\Repositories\PostRepository::class);
        $this->app->bind('GroupRepository', \App\Repositories\GroupRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
