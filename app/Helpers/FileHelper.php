<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadImage')) {
    function uploadImage(UploadedFile $file, string $path = 'reports'): string
    {
        return $file->store($path, 'public');
    }
}

if (!function_exists('uploadMultipleImages')) {
    function uploadMultipleImages(array $files, string $path = 'reports'): array
    {
        $paths = [];
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $paths[] = uploadImage($file, $path);
            }
        }
        return $paths;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage(string $filePath, string $disk = 'public'): void
    {
        if (Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }
}

if (!function_exists('deleteMultipleImages')) {
    function deleteMultipleImages(array $filePaths, string $disk = 'public'): void
    {
        foreach ($filePaths as $path) {
            deleteImage($path, $disk);
        }
    }
}
