<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class Controller
{
    protected function storeImage(UploadedFile $file, string$folder): string
    {
        $name = Str::random(24) . '.' .$file->extension();
        $destinationPath = public_path("assets/img/{$folder}");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        File::copy($file->getRealPath(), "{$destinationPath}/{$name}");

        return $name;
    }

    protected function deleteImage(?string $name, string$folder): void
    {
        if ($name) {
            File::delete(public_path("assets/img/{$folder}/{$name}"));
        }
    }
}