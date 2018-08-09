<?php

namespace MFiles\Service;

use MFiles\Service\Exception\MFilesException;

interface MFilesServiceInterface
{
    /**
     * @param MFilesRequestInterface $request
     *
     * @throws MFilesException
     *
     * @return MFilesResponseInterface
     */
    public function call(MFilesRequestInterface $request);
}
