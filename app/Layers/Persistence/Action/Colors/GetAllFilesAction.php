<?php

namespace App\Layers\Persistence\Action\Colors;

use App\Layers\Domain\Colors\GetAllFilesInterface;
use App\Layers\Persistence\Model\Colors\FileModel;
use App\Layers\Persistence\Entity\Colors\FilePersistence;
use App\Layers\Persistence\Repository\Colors\FileRepository;

class GetAllFilesAction implements GetAllFilesInterface
{
    private FileModel $_fileModel;
    private FileRepository $_fileRepository;

    public function __construct(FileModel $fileModel,  FileRepository $fileRepository)
    {
        $this->_fileModel = $fileModel;
        $this->_fileRepository = $fileRepository;
    }

    public function getAll(): array
    {
        return array_map(
            function (FilePersistence $filePersistence) {
                return $this->_fileModel->toDomain($filePersistence);
            },
            $this->_fileRepository->getAllFiles()
        );
    }
}
