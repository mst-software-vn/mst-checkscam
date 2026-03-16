<?php

namespace App\Providers;

use App\Helpers\ConfigHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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
        Blade::component('admin.layouts.includes.alert', 'admin-error');

        // Share site config to all views
        View::composer('*', function ($view) {
            $view->with('siteConfig', [
                'title' => ConfigHelper::getConfig('site_title', 'CheckScam.vn — Tra cứu lừa đảo'),
                'description' => ConfigHelper::getConfig('site_description', 'CheckScam - Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam.'),
                'keywords' => ConfigHelper::getConfig('seo_keywords', 'check scam, tố cáo lừa đảo'),
                'hotline' => ConfigHelper::getConfig('hotline', '0812.665.001'),
                'support_email' => ConfigHelper::getConfig('support_email', 'support@checkscam.vn'),
                'zalo_link' => ConfigHelper::getConfig('zalo_link', 'https://zalo.me/0812665001'),
                'facebook_link' => ConfigHelper::getConfig('facebook_link', 'https://www.facebook.com/mstsoftware.vn'),
                'telegram_link' => ConfigHelper::getConfig('telegram_link', 'https://t.me/checkscam'),
                'logo' => ConfigHelper::getConfig('logo'),
                'logo_header_light' => ConfigHelper::getConfig('logo_header_light'),
                'logo_header_dark' => ConfigHelper::getConfig('logo_header_dark'),
                'logo_footer_light' => ConfigHelper::getConfig('logo_footer_light'),
                'logo_footer_dark' => ConfigHelper::getConfig('logo_footer_dark'),
                'favicon' => ConfigHelper::getConfig('favicon'),
                'og_image' => ConfigHelper::getConfig('og_image'),
                'site_author' => ConfigHelper::getConfig('site_author', 'MST SOFTWARE'),
                'header_scripts' => ConfigHelper::getConfig('header_scripts'),
            ]);
        });
    }
}
