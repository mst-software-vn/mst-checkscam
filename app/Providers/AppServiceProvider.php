<?php

namespace App\Providers;

use App\Helpers\ConfigHelper;
use Artesaos\SEOTools\Facades\SEOTools;
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

        // 1. Share site config to ALL views (Header, Footer, Sidebar, etc. need this)
        View::composer('*', function ($view) {
            static $siteConfig = null;
            if ($siteConfig === null) {
                // We use a local variable to build the config, then assign to static
                $config = [
                    'title' => ConfigHelper::getConfig('site_title', 'CheckScam.vn - Tra cứu lừa đảo'),
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
                    'google_site_verification' => ConfigHelper::getConfig('google_site_verification'),
                    'bing_site_verification' => ConfigHelper::getConfig('bing_site_verification'),
                    'site_index' => ConfigHelper::getConfig('site_index', 'index, follow'),
                    'og_site_name' => ConfigHelper::getConfig('og_site_name', 'CheckScam.VN'),
                    'twitter_username' => ConfigHelper::getConfig('twitter_username', '@checkscam_vn'),
                    'meta_extra' => ConfigHelper::getConfig('meta_extra'),
                ];
                $siteConfig = $config;
                View::share('siteConfig', $siteConfig);
            }
        });

        // 2. Set SEO Tools ONLY when rendering the Head component
        // Use layouts.partials.head which is the actual view path
        View::composer('layouts.partials.head', function ($view) {
            $siteConfig = View::getShared()['siteConfig'] ?? null;
            if (! $siteConfig) {
                return;
            }

            // Set default SEOTools ONLY if on home page
            if (request()->is('/') || request()->is('home')) {
                SEOTools::setTitle($siteConfig['title']);
                SEOTools::setDescription($siteConfig['description']);
                SEOTools::opengraph()->setTitle($siteConfig['title']);
                SEOTools::opengraph()->setDescription($siteConfig['description']);
                SEOTools::twitter()->setTitle($siteConfig['title']);
                SEOTools::twitter()->setDescription($siteConfig['description']);
                SEOTools::jsonLd()->setTitle($siteConfig['title']);
                SEOTools::jsonLd()->setDescription($siteConfig['description']);
            }

            SEOTools::metatags()->addKeyword($siteConfig['keywords']);
            SEOTools::metatags()->addMeta('author', $siteConfig['site_author']);
            SEOTools::metatags()->addMeta('robots', $siteConfig['site_index']);

            // Site Verifications
            if ($siteConfig['google_site_verification']) {
                SEOTools::metatags()->addMeta('google-site-verification', $siteConfig['google_site_verification']);
            }
            if ($siteConfig['bing_site_verification']) {
                SEOTools::metatags()->addMeta('msvalidate.01', $siteConfig['bing_site_verification']);
            }

            // OpenGraph Global
            SEOTools::opengraph()->setSiteName($siteConfig['og_site_name']);

            if ($siteConfig['og_image']) {
                $og_img = filter_var($siteConfig['og_image'], FILTER_VALIDATE_URL)
                            ? $siteConfig['og_image']
                            : asset('storage/'.$siteConfig['og_image']);

                // Add default image (this runs only once in head)
                SEOTools::opengraph()->addImages([$og_img]);
                SEOTools::twitter()->setImage($og_img);
            }

            // Twitter Global
            SEOTools::twitter()->setSite($siteConfig['twitter_username']);

            // Json-Ld Default Schema
            SEOTools::jsonLd()->setType('WebSite');
            SEOTools::jsonLd()->setUrl(url('/'));

            // Site Search Schema
            SEOTools::jsonLd()->addValue('potentialAction', [
                '@type' => 'SearchAction',
                'target' => url('/search?q={search_term_string}'),
                'query-input' => 'required name=search_term_string',
            ]);

            // Organization / Business Schema for Home
            if (request()->is('/') || request()->is('home')) {
                $orgName = ConfigHelper::getConfig('schema_organization_name', 'CheckScam');
                $orgLogo = ConfigHelper::getConfig('schema_organization_logo');

                SEOTools::jsonLd()->addValue('@graph', [
                    [
                        '@type' => 'Organization',
                        'name' => $orgName,
                        'url' => url('/'),
                        'logo' => $orgLogo ? asset('storage/'.$orgLogo) : asset('assets/img/logo.png'),
                        'contactPoint' => [
                            '@type' => 'ContactPoint',
                            'telephone' => $siteConfig['hotline'],
                            'contactType' => 'customer service',
                        ],
                        'sameAs' => array_filter([
                            $siteConfig['facebook_link'],
                            $siteConfig['zalo_link'],
                            $siteConfig['telegram_link'],
                        ]),
                    ],
                ]);
            }
        });
    }
}
