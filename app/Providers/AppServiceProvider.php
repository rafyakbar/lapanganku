<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // db untuk MySQL
        Schema::defaultStringLength(191);

        // set locale Indonesia secara global pada class Carbon
        Carbon::setUtf8(true);
        Carbon::setLocale('id');

        // set max execution time 5 jam
        ini_set('max_execution_time', 18000);

        // memory limit
        ini_set('memory_limit', '1024M');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
