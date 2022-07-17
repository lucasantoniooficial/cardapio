<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadImageService
{
    public function validateImageUploadedAndDelete($path)
    {
        if (!Storage::exists($path)) {
            return false;
        }

        Storage::delete($path);

        return true;
    }

    public function uploadImage($request, $path)
    {
        if (!$request->hasFile('photo')) {
            return false;
        }

        return Storage::put($path, $request->photo);
    }
}
