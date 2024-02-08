<?php

namespace App\Layers\Presentation\View\Colors;

use App\Layers\Persistence\Repository\Colors\File;
use Image;

class FilesView
{
    public const FILE_NAME = 'image';
    public const WM_FILE_NAME = 'wm_image';
    public const ORIGINAL_MAIN_COLOR = 'main_color';


    public function __construct()
    {
    }

    public function toArray(array $files): array
    {
        return array_map(function ($file) {
            return [
                self::WM_FILE_NAME        => $this->textWatermark($file),
                self::ORIGINAL_MAIN_COLOR => $file->getOriginalMainColor()
            ];
        }, $files);
    }

    public function textWatermark($file)
    {
        $fileDir = env('FILE_PATH_STORAGE', 'uploads') . '/' . $file->getFileSubdir() . '/' . $file->getFileName();

        $img = Image::make(public_path($fileDir));
        $img->text('BKC', 20, 20, function ($font) use ($file) {
            $font->file(5);
            $font->color(File::MAIN_COLORS[$file->getExchangeMainColor()]);
            $font->size(70);
            $font->align('center');
            $font->valign('top');
            $font->angle(20);
        });

        $img->encode('png');
        $type = 'png';
        return 'data:image/' . $type . ';base64,' . base64_encode($img);
    }
}
