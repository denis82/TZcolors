<?php

namespace App\Framework\Traits;

use App\Layers\Persistence\Repository\Colors\File;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use  App\Framework\Tools\Watermark\WaterMark;

/**
 * Undocumented trait
 */

trait UploadFile
{

    public static function inputFile(UploadedFile $file): string
    {
        self::uploadFileInFolder($file);
        return substr(md5($file->hashName()), 0, 3);
    }

    private static function uploadFileInFolder(UploadedFile $file): string
    {
        $subdir = substr(md5($file->hashName()), 0, 3);
        Storage::disk('local')->path('') . "images/" . $subdir;
        $image = \Image::make($file);
        return $file->store("images/" . $subdir);
    }
}
