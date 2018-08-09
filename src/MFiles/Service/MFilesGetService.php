<?php

namespace MFiles\Service;

use MFiles\Service\Exception\MFilesException;

abstract class MFilesGetService extends MFilesBaseService
{
    /**
     * @param MFilesRequestInterface $request
     *
     * @throws MFilesException
     *
     * @return MFilesResponseInterface
     */
    public function call(MFilesRequestInterface $request)
    {
        $response = $this->getClient()->get(
            $this->getUri($request),
            $this->getRequestOptions($request)
        );

        $decodedResponse = $this->decodeResponse($response);
        if (isset($decodedResponse->Status) && $decodedResponse->Status > 400) {
            return $decodedResponse;
        } else {
            return $this->parseResponse($decodedResponse);
        }
    }
}
