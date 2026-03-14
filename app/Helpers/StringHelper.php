<?php

use Illuminate\Support\Str;

if (! function_exists('normalizeString')) {
    function normalizeString(string $str): string
    {
        $str = mb_strtolower(trim($str), 'UTF-8');
        $str = preg_replace('/\s+/', ' ', $str);

        return $str;
    }
}

if (! function_exists('detectQueryType')) {
    function detectQueryType(string $query): array
    {
        $formattedQuery = $query;

        // UUID
        if (Str::isUuid($formattedQuery)) {
            return ['uuid', $formattedQuery];
        }

        // Facebook URL
        if (Str::contains($formattedQuery, ['facebook.com', 'fb.com'])) {
            if (preg_match(
                '/(?:https?:\/\/)?(?:www\.)?(?:facebook|fb)\.com\/(?:profiles\/|profile\.php\?id=)?([^\/?&\s]+)/i',
                $formattedQuery,
                $matches,
            )) {
                $formattedQuery = $matches[1];
            }

            return ['facebook', $formattedQuery];
        }

        // Số điện thoại / STK
        $isNumeric = preg_match('/^[\s\+\-\.()]*\d[\d\s\+\-\.()]*$/', $formattedQuery);

        if ($isNumeric) {
            $numericRaw = preg_replace('/[^\d+]/', '', $formattedQuery);

            if (str_starts_with($numericRaw, '+84')) {
                $numericRaw = '0'.substr($numericRaw, 3);
            } elseif (preg_match('/^84(3|5|7|8|9)/', $numericRaw)) {
                $numericRaw = '0'.substr($numericRaw, 2);
            }

            $numericClean = preg_replace('/\D/', '', $numericRaw);

            if (preg_match('/^0\d{8,11}$/', $numericClean)) {
                return ['phone', $numericClean];
            }

            if (preg_match('/^\d{5,19}$/', $numericClean)) {
                return ['bank', $numericClean];
            }

            return ['name', $numericClean];
        }

        return ['name', $formattedQuery];
    }
}

if (! function_exists('generateGlobalUniqueSlug')) {
    /**
     * Tạo slug độc nhất toàn hệ thống (không trùng giữa Insurances và Posts)
     * Ưu tiên dùng Str::slug() cơ bản để chuẩn hóa tiếng Việt, chữ thường, thay khoảng trắng bằng '-'
     */
    function generateGlobalUniqueSlug(string $title, ?int $ignoreInsuranceId = null, ?int $ignorePostId = null): string
    {
        $originalSlug = Str::slug($title, '-', 'vi');
        $slug = $originalSlug;
        $counter = 2;

        while (true) {
            $existsInInsurance = \App\Models\Insurance::where('slug', $slug)
                ->when($ignoreInsuranceId, fn ($q) => $q->where('id', '!=', $ignoreInsuranceId))
                ->exists();

            $existsInPost = \App\Models\Post::where('slug', $slug)
                ->when($ignorePostId, fn ($q) => $q->where('id', '!=', $ignorePostId))
                ->exists();

            if (! $existsInInsurance && ! $existsInPost) {
                break;
            }

            $slug = $originalSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
