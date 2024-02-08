<?php

namespace App\Layers\Persistence\Repository\Colors;

use App\Layers\Persistence\Entity\Colors\FilePersistence;
use App\Layers\Persistence\Repository\Colors\File;

class FileRepository
{
    public function insert(FilePersistence $filePersistence): void
    {
        $fileEloquentModel = new File([
            'file_size'           => $filePersistence->getFileSize(),
            'file_name'           => $filePersistence->getFileName(),
            'content_type'        => $filePersistence->getMimeType(),
            'subdir'              => $filePersistence->getFileSubdir(),
            'original_main_color' => $filePersistence->getOriginalMainColor(),
            'exchange_main_color' => $filePersistence->getExchangeMainColor(),
        ]);

        $fileEloquentModel->save();
    }

    public function getAllFiles(): array
    {
        $allFiles = File::all();
        return $allFiles->map(
            fn (File $fileEloquentModel): FilePersistence => $this->_makePersistenceEntity($fileEloquentModel)
        )->toArray();
    }

    private function _makePersistenceEntity($files): FilePersistence
    {

        return new FilePersistence(
            $files->file_name,
            $files->subdir,
            $files->file_size,
            $files->content_type,
            $files->original_main_color,
            $files->exchange_main_color
        );
    }
}
