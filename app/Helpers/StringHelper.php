<?php

namespace App\Helpers;

use App\Models\Insurance;
use App\Models\Post;
use Illuminate\Support\Str;

class StringHelper
{
    /**
     * Chuẩn hóa chuỗi
     */
    public static function normalizeString(string $str): string
    {
        $str = mb_strtolower(trim($str), 'UTF-8');
        $str = preg_replace('/\s+/', ' ', $str);

        return $str;
    }

    /**
     * Nhận diện loại Query
     */
    public static function detectQueryType(string $query): array
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

    /**
     * Tạo slug độc nhất toàn hệ thống
     */
    public static function generateGlobalUniqueSlug(string $title, ?int $ignoreInsuranceId = null, ?int $ignorePostId = null): string
    {
        $originalSlug = Str::slug($title, '-', 'vi');
        $slug = $originalSlug;
        $counter = 2;

        while (true) {
            $existsInInsurance = Insurance::where('slug', $slug)
                ->when($ignoreInsuranceId, fn ($q) => $q->where('id', '!=', $ignoreInsuranceId))
                ->exists();

            $existsInPost = Post::where('slug', $slug)
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

    /**
     * Che giấu một phần tên
     */
    public static function mask_name(?string $name): string
    {
        if (! $name || mb_strtolower($name) === 'không rõ tên' || mb_strtolower($name) === 'chưa rõ thông tin' || mb_strtolower($name) === 'người dùng') {
            return 'Chưa rõ tên';
        }

        $name = preg_replace('/\s+/', ' ', trim($name));
        $parts = explode(' ', $name);
        $count = count($parts);

        if ($count <= 1) {
            $n = $parts[0];

            return (mb_strlen($n) > 1 ? mb_substr($n, 0, 1, 'UTF-8') : $n).'.';
        }

        $lastPart = array_pop($parts);
        $maskedLastPart = mb_substr($lastPart, 0, 1, 'UTF-8').'.';

        return implode(' ', $parts).' '.$maskedLastPart;
    }

    /**
     * Che giấu ID
     */
    public static function mask_id(?string $id, string $type = 'bank'): string
    {
        if (! $id) {
            return 'Đang cập nhật';
        }

        if ($type === 'website' || str_contains($id, '/')) {
            if (str_contains($id, '/')) {
                $parts = explode('/', $id);
                $lastPart = array_pop($parts);
                if (empty($lastPart)) {
                    $lastPart = array_pop($parts);
                }

                return implode('/', $parts).'/'.self::mask_name($lastPart);
            }

            return self::mask_name($id);
        }

        $id = preg_replace('/\D/', '', $id);
        if (strlen($id) <= 6) {
            return substr($id, 0, 1).'***'.substr($id, -1);
        }

        return substr($id, 0, 3).'***'.substr($id, -3);
    }

    /**
     * Che giấu tên người báo cáo
     */
    public static function mask_reporter_name(?string $name): string
    {
        if (! $name || mb_strtolower($name) === 'người dùng') {
            return 'Người dùng';
        }

        $name = preg_replace('/\s+/', ' ', trim($name));
        $parts = explode(' ', $name);
        $count = count($parts);

        if ($count <= 1) {
            return mb_substr($parts[0], 0, 1, 'UTF-8').'******';
        }

        $lastPart = array_pop($parts);
        $maskedLastPart = mb_substr($lastPart, 0, 1, 'UTF-8').'******';

        return implode(' ', $parts).' '.$maskedLastPart;
    }

    /**
     * Che giấu số điện thoại
     */
    public static function mask_phone(?string $phone): string
    {
        if (! $phone) {
            return '';
        }

        $phone = trim($phone);
        if (strlen($phone) <= 4) {
            return '****';
        }

        return substr($phone, 0, -4).'****';
    }
}
