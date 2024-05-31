<?php


namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Service\ImageUploadService;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function upload(UploadRequest $request)
    {
        if ($request->hasFile('photo')) {
            $image = $this->imageUploadService->upload($request->file('photo'));
            return response()->json($image);
        }

        return response()->json(['message' => 'Image upload failed'], 500);
    }
}
