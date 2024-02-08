<?php

namespace App\Layers\Persistence\Action\Colors;

use App\Layers\Domain\Colors\Entity\FileDomain;
use App\Layers\Domain\Colors\SaveNewFileInterface;
use App\Layers\Persistence\Model\Colors\FileModel;
use App\Layers\Persistence\Repository\Colors\FileRepository;

class SaveNewFileAction implements SaveNewFileInterface
{
    private FileModel $_fileModel;
    private FileRepository $_fileRepository;

    public function __construct(
        FileModel $fileModel,
        FileRepository $fileRepository
    ) {
        $this->_fileModel = $fileModel;
        $this->_fileRepository = $fileRepository;
    }

    public function save(FileDomain $file): void
    {
        $this->_fileRepository->insert(
            $this->_fileModel->fromDomain($file)
        );
    }
}
