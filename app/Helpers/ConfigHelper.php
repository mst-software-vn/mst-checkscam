<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class ConfigHelper
{
    private const CACHE_PREFIX = 'config_';

    private const CACHE_TTL = 3600; // 1 hour

    public static function getConfig(string $name, mixed $default = null): mixed
    {
        return Cache::remember(
            self::CACHE_PREFIX.$name,
            self::CACHE_TTL,
            function () use ($name, $default) {
                $setting = Setting::find($name);
                if ($setting) {
                    return $setting->value;
                }

                Setting::setValue($name, $default);

                return $default;
            },
        );
    }

    public static function setConfig(string $name, mixed $value): bool
    {
        Setting::setValue($name, $value);
        Cache::forget(self::CACHE_PREFIX.$name);

        return true;
    }

    public static function clearCache(?string $name = null): void
    {
        if ($name) {
            Cache::forget(self::CACHE_PREFIX.$name);
        } else {
            $keys = [
                'site_title', 'site_description', 'seo_keywords',
                'hotline', 'support_email', 'zalo_link',
                'facebook_link', 'telegram_link',
                'logo', 'logo_header_light', 'logo_header_dark', 'logo_footer_light', 'logo_footer_dark',
                'favicon', 'og_image', 'site_author',
                'enable_insurance', 'enable_comments', 'maintenance_mode',
                'header_scripts',
                'google_site_verification', 'bing_site_verification', 'site_index',
                'og_site_name', 'twitter_username', 'schema_organization_name',
                'schema_organization_logo', 'schema_organization_url', 'schema_organization_contact',
                'meta_extra', 'site_notification_text',
            ];

            foreach ($keys as $key) {
                Cache::forget(self::CACHE_PREFIX.$key);
            }
        }
    }
}
