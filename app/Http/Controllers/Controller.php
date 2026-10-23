<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class Controller
{

    protected function storeImage(UploadedFile $file, string $folder): string
    {
        $name = Str::random(24) . '.' . $file->extension();
        $file->move(public_path("assets/img/{$folder}"), $name);

        return $name;
    }

    protected function deleteImage(?string $name, string $folder): void
    {
        if ($name) {
            File::delete(public_path("assets/img/{$folder}/{$name}"));
        }
    }
}
