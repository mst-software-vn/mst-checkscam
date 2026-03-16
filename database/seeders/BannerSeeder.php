<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            // Home Top — Vietnix banner
            [
                'title' => 'Vietnix Optimizer Banner',
                'image_path' => 'https://image.vietnix.vn/wp-content/uploads/2025/10/banner-vnx-optimizer-2048x216.webp',
                'redirect_url' => '#',
                'position' => 'home_top',
                'type' => 'horizontal',
                'sort_order' => 0,
            ],
            // Home Between (after section 1) — Liên Quân GIÁ RẺ
            [
                'title' => 'Liên Quân Giá Rẻ',
                'image_path' => 'https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif',
                'redirect_url' => '#',
                'position' => 'home_between',
                'type' => 'horizontal',
                'sort_order' => 0,
            ],
            // Home Between (after section 2) — Banner 3
            [
                'title' => 'Banner QC 3',
                'image_path' => 'https://i.ibb.co/BV9hbrP2/banner3.gif',
                'redirect_url' => '#',
                'position' => 'home_between',
                'type' => 'horizontal',
                'sort_order' => 1,
            ],
            // Home Sidebar — Fpayment
            [
                'title' => 'Fpayment Ads',
                'image_path' => 'https://i.ibb.co/kgwtn4vF/fpayment.jpg',
                'redirect_url' => '#',
                'position' => 'home_sidebar',
                'type' => 'square',
                'sort_order' => 0,
            ],
            // Home Sidebar — Flash Sale
            [
                'title' => 'Flash Sale Banner',
                'image_path' => 'https://png.pngtree.com/png-clipart/20250126/original/pngtree-hologram-gradient-flash-sale-square-poster-banner-promotion-vector-png-image_19237469.png',
                'redirect_url' => '#',
                'position' => 'home_sidebar',
                'type' => 'square',
                'sort_order' => 1,
            ],
            // Blog Detail Sidebar — Fpayment
            [
                'title' => 'Fpayment Blog Ads',
                'image_path' => 'https://i.ibb.co/kgwtn4vF/fpayment.jpg',
                'redirect_url' => '#',
                'position' => 'blog',
                'type' => 'square',
                'sort_order' => 0,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::firstOrCreate(
                ['title' => $banner['title']],
                array_merge($banner, ['status' => true]),
            );
        }
    }
}
