<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FileHelper
{
    /**
     * Tên Disk mặc định để đẩy file vào thư mục public
     */
    const DISK = 'my_public';

    /**
     * Upload một hình ảnh đơn lẻ và chuyển đổi sang WebP
     */
    public static function uploadImage(UploadedFile $file, string $path = 'reports'): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $imagesMimes = ['jpeg', 'jpg', 'png', 'webp', 'gif'];

        if (in_array($extension, $imagesMimes)) {
            try {
                // Đảm bảo thư mục tồn tại trên disk my_public
                Storage::disk(self::DISK)->makeDirectory($path);

                $filename = Str::random(40).'.webp';
                $storePath = $path.'/'.$filename;

                // Lấy đường dẫn vật lý tuyệt đối trên hosting để Intervention Image ghi file
                $fullPath = Storage::disk(self::DISK)->path($storePath);

                $manager = new ImageManager(new Driver);

                // Mute libpng warning
                set_error_handler(function ($errno, $errstr) {
                    if (strpos($errstr, 'libpng warning') !== false) {
                        return true;
                    }

                    return false;
                });

                $image = $manager->read($file->getRealPath());
                restore_error_handler();

                // Scale down và lưu thẳng vào thư mục public qua $fullPath
                $image->scaleDown(width: 1200);
                $image->toWebp(80)->save($fullPath);

                return $storePath;

            } catch (\Throwable $th) {
                restore_error_handler();

                // Nếu Intervention lỗi, fallback về upload thường của Laravel vào disk my_public
                return $file->store($path, self::DISK);
            }
        }

        return $file->store($path, self::DISK);
    }

    /**
     * Upload nhiều hình ảnh cùng lúc
     */
    public static function uploadMultipleImages(array $files, string $path = 'reports'): array
    {
        $paths = [];
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $paths[] = self::uploadImage($file, $path);
            }
        }

        return $paths;
    }

    /**
     * Xóa một hình ảnh khỏi Storage (Mặc định dùng disk my_public)
     */
    public static function deleteImage(string $filePath, string $disk = self::DISK): void
    {
        if (Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }

    /**
     * Xóa nhiều hình ảnh cùng lúc
     */
    public static function deleteMultipleImages(array $filePaths, string $disk = self::DISK): void
    {
        foreach ($filePaths as $path) {
            self::deleteImage($path, $disk);
        }
    }
}
