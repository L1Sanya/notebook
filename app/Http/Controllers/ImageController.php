<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('images', 'public');

            $image = new Image();
            $image->path = $filePath;
            $image->save();

            return response()->json(['message' => 'Image uploaded successfully', 'path' => $filePath], 200);
        }

        return response()->json(['message' => 'Image upload failed'], 500);
    }
}
