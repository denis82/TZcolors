<?php

namespace App\Layers\Domain\Colors;

use App\Framework\Tools\MainColor;
use App\Framework\Traits\UploadFile;
use App\Layers\Domain\Colors\Dto\CreateFileDto;
use App\Layers\Domain\Colors\Entity\FileDomain;

class FileBuilder
{
    use UploadFile;

    public function __construct()
    {
    }

    public function make(CreateFileDto $createFileDto): FileDomain
    {

        $subdir = self::inputFile($createFileDto->getImage());
        $originalMainColor = MainColor::getOriginalMainColor($createFileDto);
        $exchangeMainColor = MainColor::getExchangeMainColor($originalMainColor);
        //dd($originalMainColor, $exchangeMainColor);
        return new FileDomain(
            $createFileDto->getImage()->hashName(),
            env('FILELOAER_DIR', 'images') . "/" . $subdir,
            $createFileDto->getImage()->getSize(),
            $createFileDto->getImage()->getMimeType(),
            //$createFileDto->getImage()->getClientOriginalName(),
            $originalMainColor,
            $exchangeMainColor
        );
    }
}
