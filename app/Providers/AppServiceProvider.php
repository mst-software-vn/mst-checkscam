<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class Auth extends \Illuminate\Support\Facades\Auth {}
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
        //
        Blade::component('layouts.partials.header', 'header');
        Blade::component('layouts.partials.footer', 'footer');
        Blade::component('layouts.partials.head', 'head');
    }
}
