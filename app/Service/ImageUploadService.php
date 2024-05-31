<?php

namespace App\Service;

use App\Models\Image;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function upload(UploadedFile $file): ?Image
    {
        $filePath = null;

        try {
            $filePath = $file->store('images', 'public');

            $image = new Image();
            $image->path = $filePath;
            $image->save();

            return $image;
        } catch (Exception $e) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }

            Log::error('Failed to upload image: ' . $e->getMessage());
            return null;
        }
    }
}
