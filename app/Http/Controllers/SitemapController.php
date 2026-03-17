<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\Post;
use App\Models\Report;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generate()
    {
        $sitemap = Sitemap::create();

        // Trang chủ
        $sitemap->add(Url::create('/')
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

        // Trang cẩm nang
        $sitemap->add(Url::create('/bai-viet')
            ->setPriority(0.8)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

        // Thêm các bài viết
        Post::chunk(100, function ($posts) use ($sitemap) {
            foreach ($posts as $post) {
                $sitemap->add(Url::create(route('posts.frontend.show', $post->slug))
                    ->setLastModificationDate($post->updated_at)
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
            }
        });

        // Thêm các vụ tố cáo
        Report::active()->chunk(100, function ($reports) use ($sitemap) {
            foreach ($reports as $report) {
                $sitemap->add(Url::create(route('scammer.show', $report->slug))
                    ->setLastModificationDate($report->updated_at)
                    ->setPriority(0.6)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
            }
        });

        // Thêm các hồ sơ bảo hiểm
        Insurance::chunk(100, function ($insurances) use ($sitemap) {
            foreach ($insurances as $insurance) {
                $sitemap->add(Url::create(route('insurances.frontend.show', $insurance->slug))
                    ->setLastModificationDate($insurance->updated_at)
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
            }
        });

        // Lưu file sitemap.xml vào thư mục public
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->json([
            'success' => true,
            'message' => 'Sitemap has been generated successfully.',
        ]);
    }
}
