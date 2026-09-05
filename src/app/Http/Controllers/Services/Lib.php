<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Lib
{
    public static function storeImage($request)
    {
        $imageFile = $request->img;
        $imagePath = '';
        $file_name = '';
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $dir = 'jobs';
            $file_path = $request->file('img')->store('public/' . $dir);
            $file_name = str_replace('public/' . $dir . '/', '', $file_path);
            $imagePath = 'storage/' . $dir . '/' . $file_name;
        }

        return [$file_name, $imagePath];
    }

    public static function deleteImage($data)
    {
        Storage::disk('public')->delete('jobs/' . $data);
    }
}
