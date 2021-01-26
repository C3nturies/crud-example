<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/*fix string length*/
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //str len 191
        Schema::defaultStringLength(191);
    }
}
