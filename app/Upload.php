<?php
namespace App;

use Illuminate\Support\Facades\Storage;

trait Upload
{
    private function copyToStorage($fileName)
    {
        $sourcePath = public_path("assets/images/" . $fileName);

        if (file_exists($sourcePath)) {
            Storage::disk("public")->put($fileName, file_get_contents($sourcePath));
            return $fileName;
        }

        return null;
    }
}
