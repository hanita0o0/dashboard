<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AllService;

class AllServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(AllService::class,function($app){
            return new AllService();
        });
    }
}
