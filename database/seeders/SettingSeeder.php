<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // SEO & Website
            'site_title' => 'Check Scam - Tra cứu lừa đảo',
            'site_description' => 'CheckScam - Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Tra cứu số điện thoại, số tài khoản, link Facebook lừa đảo để bảo vệ túi tiền của bạn.',
            'seo_keywords' => 'check scam, tố cáo lừa đảo, kiểm tra stk lừa đảo, kiểm tra sdt lừa đảo, quỹ bảo đảm, checkscam',

            // Contact
            'hotline' => '0812.665.001',
            'support_email' => 'inf@mstsoftware.vn',
            'zalo_link' => 'https://zalo.me/0812665001',
            'facebook_link' => 'https://www.facebook.com/mstsoftware.vn',
            'telegram_link' => 'https://t.me/checkscam',

            // Images
            'logo' => null,
            'logo_header_light' => 'https://i.ibb.co/7xfz0v3K/black.png',
            'logo_header_dark' => 'https://i.ibb.co/wFZsnJBR/white.png',
            'logo_footer_light' => 'https://i.ibb.co/wFZsnJBR/white.png',
            'logo_footer_dark' => 'https://i.ibb.co/wFZsnJBR/white.png',
            'favicon' => 'https://i.ibb.co/fV1xYHVS/favicon.png',
            'og_image' => 'https://i.ibb.co/kZRWpmK/Cover-photo.jpg',

            // SEO Additional
            'site_author' => 'MST SOFTWARE',

            // Modules
            'enable_insurance' => '1',
            'enable_comments' => '1',
            'maintenance_mode' => '0',

            // Scripts
            'header_scripts' => null,

            // Advanced SEO
            'google_site_verification' => null,
            'bing_site_verification' => null,
            'site_index' => 'index, follow',
            'og_site_name' => 'CheckScam.vn',
            'twitter_username' => '@checkscam_vn',
            'meta_extra' => null,
            'schema_organization_name' => 'MST CheckScam Ecosystem',
            'schema_organization_logo' => 'https://i.ibb.co/7xfz0v3K/black.png',
            'schema_organization_url' => 'https://checkscam.vn',
            'schema_organization_contact' => '0812.665.001',
        ];

        foreach ($settings as $name => $value) {
            Setting::firstOrCreate(
                ['name' => $name],
                ['value' => $value],
            );
        }
    }
}
