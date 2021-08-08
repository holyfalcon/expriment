<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\SmsNotification;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind('SmsNotification', function ($app,$mes){
//            return new SmsNotification($mes[0]);
//        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
