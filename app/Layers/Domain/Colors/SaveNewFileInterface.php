<?php

namespace App\Layers\Domain\Colors;

use App\Layers\Domain\Colors\Entity\FileDomain;

interface SaveNewFileInterface
{
    public function save(FileDomain $file): void;
}
