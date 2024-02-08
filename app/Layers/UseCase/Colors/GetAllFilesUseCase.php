<?php

namespace App\Layers\UseCase\Colors;

use App\Layers\Domain\Colors\GetAllFilesInterface;

class GetAllFilesUseCase
{
     private GetAllFilesInterface $_getAllFiles;

     public function __construct(GetAllFilesInterface $getFiles)
     {
          $this->_getAllFiles = $getFiles;
     }

     public function getAll(): array
     {
          return $this->_getAllFiles->getAll();
     }
}
