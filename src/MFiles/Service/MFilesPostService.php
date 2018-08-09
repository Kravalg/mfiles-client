<?php

namespace MFiles\Service;

use MFiles\Service\Exception\InvalidJsonException;

abstract class MFilesPostService extends MFilesBaseService
{
    /**
     * @param MFilesRequestInterface $request
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientErrorException
     * @throws Exception\NotFoundException
     * @throws Exception\ServiceException
     * @throws InvalidJsonException
     *
     * @return MFilesResponseInterface
     */
    public function call(MFilesRequestInterface $request)
    {
        $response = $this->getClient()->post($this->getUri(), $this->getRequestOptions($request));

        $decodedResponse = $this->decodeResponse($response);

        return $this->parseResponse($decodedResponse);
    }
}
