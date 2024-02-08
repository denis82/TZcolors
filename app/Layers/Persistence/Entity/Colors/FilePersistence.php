<?php

namespace App\Layers\Persistence\Entity\Colors;

class FilePersistence
{
    private string $_fileName;
    private string $_fileSubdir;
    private string $_fileSize;
    private string $_fileMimeType;
    private string $_fileOriginalMainColor;
    private string $_fileExchangeMainColor;

    public function __construct(
        ?string $fileName,
        ?string $fileSubdir,
        ?string $fileSize,
        ?string $fileMimeType,
        ?string $fileOriginalMainColor,
        ?string  $fileExchangeMainColor,
    ) {
        $this->_fileName                 = $fileName;
        $this->_fileSubdir               = $fileSubdir;
        $this->_fileSize                 = $fileSize;
        $this->_fileMimeType             = $fileMimeType;
        $this->_fileOriginalMainColor    = $fileOriginalMainColor;
        $this->_fileExchangeMainColor    = $fileExchangeMainColor;
    }

    public function getFileName(): string
    {
        return $this->_fileName;
    }

    public function getFileSubdir(): string
    {
        return $this->_fileSubdir;
    }

    public function getFileSize(): string
    {
        return $this->_fileSize;
    }

    public function getMimeType(): string
    {
        return $this->_fileMimeType;
    }

    public function getOriginalMainColor(): string
    {
        return $this->_fileOriginalMainColor;
    }

    public function getExchangeMainColor(): string
    {
        return $this->_fileExchangeMainColor;
    }
}
