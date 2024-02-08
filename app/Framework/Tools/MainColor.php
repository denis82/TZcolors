<?php

namespace App\Framework\Tools;

use App\Framework\Tools\ShadeFilters\FilterInterface;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Framework\Tools\ShadePipe\Shade;
use Illuminate\Pipeline\Pipeline;
use App\Layers\Domain\Colors\Dto\CreateFileDto;
use App\Layers\Persistence\Repository\Colors\File;

class MainColor
{

    public static function getExchangeMainColor(string $originalMainColor): string
    {
        $rgb = self::getMainColorRGB($originalMainColor);
        //dd($hex,$rgb);
        foreach (app(Shade::class)->filters() as $filter) {
            $color = $filter->apply($rgb);
            if ($color) {
                return File::EXCHANGE_COLORS[$color];
            }
        }
        return File::EXCHANGE_COLORS[File::BLACK];
    }

    public static function getOriginalMainColor(CreateFileDto $fileDir): string
    {
        return self::getMainColorHex($fileDir);

    }

    private static function getMainColorHex(CreateFileDto $fileDir): string
    {

        $filename = $fileDir->getImage()->path();
        $info = getimagesize($filename);
        switch ($info[2]) {
            case 1:
                $img = imageCreateFromGif($filename);
                break;
            case 2:
                $img = imageCreateFromJpeg($filename);
                break;
            case 3:
                $img = imageCreateFromPng($filename);
                break;
        }
        $width = ImageSX($img);
        $height = ImageSY($img);
        $thumb = imagecreatetruecolor(1, 1);
        imagecopyresampled($thumb, $img, 0, 0, 0, 0, 1, 1, $width, $height);
        $color = '#' . dechex(imagecolorat($thumb, 0, 0));
        imageDestroy($img);
        imageDestroy($thumb);
        return $color;
    }

    private static function getMainColorRGB(string $hex): array
    {
        $split = str_split(Str::of($hex)->ltrim('#'), 2);
        $r = hexdec(array_shift($split));
        $g = hexdec(array_shift($split));
        $b = hexdec(array_shift($split));
        return [$r, $g, $b];
    }
}
