<?php

namespace App\Providers;

use App\Service\TestService;
use App\Facades\Test;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
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
//        $this->app->singleton('test', function () {
//            return new TestService();
//        });
//        $this->app->bind('App\Contracts\TestContract', function () {
//            return new TestService();
//        });
//
        $this->app->singleton('test', function () {
            //return new TestService();
            return new  Test();
        });

        $this->app->bind('App\Contracts\TestContract', function () {
            return new TestService();
        });

    }
}
