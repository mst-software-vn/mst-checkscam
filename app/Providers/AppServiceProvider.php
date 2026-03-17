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
            $siteConfig = [
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
                'og_site_name' => ConfigHelper::getConfig('og_site_name', 'CheckScam.vn'),
                'twitter_username' => ConfigHelper::getConfig('twitter_username', '@checkscam_vn'),
                'meta_extra' => ConfigHelper::getConfig('meta_extra'),
            ];

            $view->with('siteConfig', $siteConfig);

            // Set default SEOTools ONLY if not a sub-page or if home page
            // This prevents overwriting specific titles from Controllers
            if (request()->is('/') || request()->is('home')) {
                \Artesaos\SEOTools\Facades\SEOTools::setTitle($siteConfig['title']);
                \Artesaos\SEOTools\Facades\SEOTools::setDescription($siteConfig['description']);
                \Artesaos\SEOTools\Facades\SEOTools::opengraph()->setTitle($siteConfig['title']);
                \Artesaos\SEOTools\Facades\SEOTools::opengraph()->setDescription($siteConfig['description']);
                \Artesaos\SEOTools\Facades\SEOTools::twitter()->setTitle($siteConfig['title']);
                \Artesaos\SEOTools\Facades\SEOTools::twitter()->setDescription($siteConfig['description']);
                \Artesaos\SEOTools\Facades\SEOTools::jsonLd()->setTitle($siteConfig['title']);
                \Artesaos\SEOTools\Facades\SEOTools::jsonLd()->setDescription($siteConfig['description']);
            }

            \Artesaos\SEOTools\Facades\SEOTools::metatags()->addKeyword($siteConfig['keywords']);
            \Artesaos\SEOTools\Facades\SEOTools::metatags()->addMeta('author', $siteConfig['site_author']);
            \Artesaos\SEOTools\Facades\SEOTools::metatags()->addMeta('robots', $siteConfig['site_index']);

            // Site Verifications
            if ($siteConfig['google_site_verification']) {
                \Artesaos\SEOTools\Facades\SEOTools::metatags()->addMeta('google-site-verification', $siteConfig['google_site_verification']);
            }
            if ($siteConfig['bing_site_verification']) {
                \Artesaos\SEOTools\Facades\SEOTools::metatags()->addMeta('msvalidate.01', $siteConfig['bing_site_verification']);
            }

            // OpenGraph Global
            \Artesaos\SEOTools\Facades\SEOTools::opengraph()->setSiteName($siteConfig['og_site_name']);

            if ($siteConfig['og_image']) {
                $og_img = filter_var($siteConfig['og_image'], FILTER_VALIDATE_URL)
                            ? $siteConfig['og_image']
                            : asset('storage/'.$siteConfig['og_image']);
                \Artesaos\SEOTools\Facades\SEOTools::opengraph()->addImage($og_img);
                \Artesaos\SEOTools\Facades\SEOTools::twitter()->setImage($og_img);
            }

            // Twitter Global
            \Artesaos\SEOTools\Facades\SEOTools::twitter()->setSite($siteConfig['twitter_username']);

            // Json-Ld Default Schema
            \Artesaos\SEOTools\Facades\SEOTools::jsonLd()->setType('WebSite');
            \Artesaos\SEOTools\Facades\SEOTools::jsonLd()->setUrl(url('/'));

            // Site Search Schema
            \Artesaos\SEOTools\Facades\SEOTools::jsonLd()->addValue('potentialAction', [
                '@type' => 'SearchAction',
                'target' => url('/search?q={search_term_string}'),
                'query-input' => 'required name=search_term_string',
            ]);

            // Organization / Business Schema for Home
            if (request()->is('/') || request()->is('home')) {
                $orgName = ConfigHelper::getConfig('schema_organization_name', 'CheckScam');
                $orgLogo = ConfigHelper::getConfig('schema_organization_logo');

                \Artesaos\SEOTools\Facades\SEOTools::jsonLd()->addValue('@graph', [
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
