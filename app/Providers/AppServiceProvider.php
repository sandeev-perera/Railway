<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if (session()->has('user')) {
        //     View::share('currentPassengerId', session('role') === 'passenger' ? session('user')?->passenger?->id : '--');
        // }
    }
}
