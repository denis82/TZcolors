<?php

namespace App\Framework\Di;

use App\Layers\Domain\Colors\GetAllFilesInterface;
use App\Layers\Domain\Colors\SaveNewFileInterface;
use App\Layers\Persistence\Action\Colors\GetAllFilesAction;
use App\Layers\Persistence\Action\Colors\SaveNewFileAction;

class Colors
{
    public function __invoke(): array
    {
        return [
            SaveNewFileInterface::class => SaveNewFileAction::class,
            GetAllFilesInterface::class => GetAllFilesAction::class,

        ];
    }
}
