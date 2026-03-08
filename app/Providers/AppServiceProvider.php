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
        // client
        Blade::component('layouts.partials.header', 'header');
        Blade::component('layouts.partials.footer', 'footer');
        Blade::component('layouts.partials.head', 'head');

        // admin
        Blade::component('admin.layouts.partials.head', 'admin-head');
        Blade::component('admin.layouts.partials.sidebar', 'admin-sidebar');
        Blade::component('admin.layouts.partials.header', 'admin-header');
        Blade::component('admin.layouts.partials.footer', 'admin-footer');
    }
}
