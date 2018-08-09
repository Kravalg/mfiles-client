<?php

namespace MFiles\Service;

interface MFilesResponseInterface
{
    /**
     * @return int
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getMessage();
}
