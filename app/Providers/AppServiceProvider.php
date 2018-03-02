<?php

namespace App\Providers;

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
        /**
         * db untuk MySQL
         */
        Schema::defaultStringLength(191);

        /**
         * set locale Indonesia secara global pada class Carbon
         */
        \Carbon\Carbon::setlocale('id');

        /**
         * set max execution time 5 jam
         */
        ini_set('max_execution_time', 18000);
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
