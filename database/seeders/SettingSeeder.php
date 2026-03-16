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
            'site_title' => 'CheckScam.vn — Tra cứu lừa đảo',
            'site_description' => 'CheckScam - Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Tra cứu số điện thoại, số tài khoản, link Facebook lừa đảo để bảo vệ túi tiền của bạn.',
            'seo_keywords' => 'check scam, tố cáo lừa đảo, kiểm tra stk lừa đảo, kiểm tra sdt lừa đảo, quỹ bảo đảm, checkscam',

            // Contact
            'hotline' => '0812.665.001',
            'support_email' => 'support@checkscam.vn',
            'zalo_link' => 'https://zalo.me/0812665001',
            'facebook_link' => 'https://www.facebook.com/mstsoftware.vn',
            'telegram_link' => 'https://t.me/checkscam',

            // Images
            'logo' => null,
            'favicon' => null,
            'og_image' => null,

            // Modules
            'enable_insurance' => '1',
            'enable_comments' => '1',
            'maintenance_mode' => '0',

            // Scripts
            'header_scripts' => null,
        ];

        foreach ($settings as $name => $value) {
            Setting::firstOrCreate(
                ['name' => $name],
                ['value' => $value],
            );
        }
    }
}
