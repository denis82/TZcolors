<?php

namespace App\Layers\UseCase\Colors;

use App\Layers\Domain\Colors\FileBuilder;
use App\Layers\Domain\Colors\Dto\CreateFileDto;
use App\Layers\Domain\Colors\SaveNewFileInterface;

class CreateNewFileUseCase
{
    private FileBuilder $_fileBuilder;
    private SaveNewFileInterface $_saveFile;

    public function __construct(FileBuilder $fileBuilder, SaveNewFileInterface $saveFile)
    {
        $this->_fileBuilder = $fileBuilder;
        $this->_saveFile = $saveFile;
    }

    public function create(CreateFileDto $createFileDto): void
    {
        $file = $this->_fileBuilder->make($createFileDto);
        $this->_saveFile->save($file);
    }
}
