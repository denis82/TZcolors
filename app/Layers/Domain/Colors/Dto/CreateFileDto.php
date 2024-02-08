<?php

namespace App\Layers\Domain\Colors\Dto;

use Illuminate\Http\UploadedFile;

class CreateFileDto
{
    private UploadedFile $image;

    public function __construct(UploadedFile $image)
    {
        $this->image = $image;
    }

    public function getImage(): UploadedFile
    {
        return $this->image;
    }
}
