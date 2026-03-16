<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Upload một hình ảnh đơn lẻ
     */
    public static function uploadImage(UploadedFile $file, string $path = 'reports'): string
    {
        return $file->store($path, 'public');
    }

    /**
     * Upload nhiều hình ảnh cùng lúc
     */
    public static function uploadMultipleImages(array $files, string $path = 'reports'): array
    {
        $paths = [];
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                // Gọi method static trong cùng class thông qua self::
                $paths[] = self::uploadImage($file, $path);
            }
        }

        return $paths;
    }

    /**
     * Xóa một hình ảnh khỏi Storage
     */
    public static function deleteImage(string $filePath, string $disk = 'public'): void
    {
        if (Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }

    /**
     * Xóa nhiều hình ảnh cùng lúc
     */
    public static function deleteMultipleImages(array $filePaths, string $disk = 'public'): void
    {
        foreach ($filePaths as $path) {
            // Gọi method static trong cùng class thông qua self::
            self::deleteImage($path, $disk);
        }
    }
}
