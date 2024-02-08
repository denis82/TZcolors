<?php

namespace App\Layers\Persistence\Model\Colors;

use App\Layers\Domain\Colors\Entity\FileDomain;
use App\Layers\Persistence\Entity\Colors\FilePersistence;

class FileModel
{
    public function fromDomain(FileDomain $fileDomain): FilePersistence
    {
        return new FilePersistence(
            $fileDomain->getFileName(),
            $fileDomain->getFileSubdir(),
            $fileDomain->getFileSize(),
            $fileDomain->getMimeType(),
            $fileDomain->getOriginalMainColor(),
            $fileDomain->getExchangeMainColor()
        );
    }
    public function toDomain(FilePersistence $filePersistence): FileDomain
    {
        return new FileDomain(
            $filePersistence->getFileName(),
            $filePersistence->getFileSubdir(),
            $filePersistence->getFileSize(),
            $filePersistence->getMimeType(),
            $filePersistence->getOriginalMainColor(),
            $filePersistence->getExchangeMainColor(),
        );
    }
}
