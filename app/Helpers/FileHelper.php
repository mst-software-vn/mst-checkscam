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
        $extension = strtolower($file->getClientOriginalExtension());
        $imagesMimes = ['jpeg', 'jpg', 'png', 'webp', 'gif'];

        if (in_array($extension, $imagesMimes)) {
            try {
                // Ensure directory exists
                Storage::disk('public')->makeDirectory($path);

                $filename = \Illuminate\Support\Str::random(40).'.webp';
                $storePath = $path.'/'.$filename;
                $fullPath = Storage::disk('public')->path($storePath);

                // Use Intervention Image Version 3 wrapper
                $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver);

                // Mute libpng warning for iCCP incorrect profiles temporarily via custom error handler
                set_error_handler(function ($errno, $errstr) {
                    // ignore image warnings
                    if (strpos($errstr, 'libpng warning') !== false) {
                        return true;
                    }

                    return false;
                });

                $image = $manager->read($file->getRealPath());

                restore_error_handler();

                // Optimize size if it's too large, scale down proportionally
                $image->scaleDown(width: 1200);

                // Keep optimization of size and save as WebP 80 quality
                $image->toWebp(80)->save($fullPath);

                return $storePath;

            } catch (\Throwable $th) {
                restore_error_handler();

                // Fallback to normal upload process if intervention fails (GD extension not enabled, bad formats, etc.)
                return $file->store($path, 'public');
            }
        }

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
