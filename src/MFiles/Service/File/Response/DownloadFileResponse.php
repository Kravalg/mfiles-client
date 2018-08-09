<?php

namespace MFiles\Service\File\Response;

use MFiles\Service\Response\BaseResponse;

class DownloadFileResponse extends BaseResponse
{
    /** @var string */
    private $file;

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }
}
