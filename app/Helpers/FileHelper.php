<?php

namespace App\Helpers;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileHelper
{
    public static function store($file, $directory, $length = 16)
    {
        try {
            if ($file instanceof UploadedFile) {
                $filename = Str::random($length);
                $extention = $file->getClientOriginalExtension();

                // Define the path by which we will store the new image
                $path = 'public/file/' . $filename . '.' . $extention;
                if (isset($directory)) {
                    $path = 'public/file/' . $directory . '/' . $filename . '.' . $extention;
                }

                // Store image
                Storage::put($path, (string) $file->get(), 'public');

                // Save to file table
                $file = File::create([
                    'name' => $filename . '.' . $extention,
                    'location' => $directory
                ]);

                return $file;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return false;
    }
}
