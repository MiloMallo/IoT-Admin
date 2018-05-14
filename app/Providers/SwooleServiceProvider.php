<?php

namespace App\Providers;

use App\handlers\SwooleHandler;
use Illuminate\Support\ServiceProvider;

class SwooleServiceProvider extends ServiceProvider
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
        $this->app->bind('swoole',function(){
            return new SwooleHandler();
        });
    }
}
