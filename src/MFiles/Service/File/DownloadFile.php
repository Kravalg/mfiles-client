<?php

namespace MFiles\Service\File;

use MFiles\Service\File\Request\DownloadFileRequest;
use MFiles\Service\File\Response\DownloadFileResponse;
use MFiles\Service\MFilesGetService;
use MFiles\Service\MFilesRequestInterface;
use MFiles\Service\MFilesResponseInterface;

class DownloadFile extends MFilesGetService
{
    const URI = 'objects/{{ObjectType}}/{{ObjectID}}/{{ObjectVersion}}/files/{{FileID}}/content';

    /**
     * Return the service URI.
     * Follow the rules from RFC 3986 http://tools.ietf.org/html/rfc3986#section-5.2.
     *
     * @param MFilesRequestInterface|null $request
     *
     * @return string
     */
    public function getUri($request = null): string
    {
        /** @var DownloadFileRequest $request */
        $uri = $this->generateDynamicUriFromParams([
            'ObjectType'    => $request->getObjectType(),
            'ObjectID'      => $request->getObjectID(),
            'ObjectVersion' => $request->getObjectVersion(),
            'FileID'        => $request->getFileID(),
        ], self::URI);

        return $uri;
    }

    /**
     * Transform an Request to POST parameters.
     *
     * @param MFilesRequestInterface $request
     *
     * @return array
     */
    public function getRequestOptions(MFilesRequestInterface $request): array
    {
        return [];
    }

    /**
     * Transform an JSON response to a Response object.
     *
     * @param $response
     *
     * @return MFilesResponseInterface
     */
    protected function parseResponse($response): MFilesResponseInterface
    {
        $downloadFileResponse = new DownloadFileResponse();

        $downloadFileResponse->setFile($response);

        return $downloadFileResponse;
    }

    /**
     * @param MFilesRequestInterface $request
     *
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     *
     * @return MFilesResponseInterface
     */
    public function call(MFilesRequestInterface $request)
    {
        $response = $this->getClient()->get(
            $this->getUri($request),
            $this->getRequestOptions($request)
        );

        return $this->parseResponse($response);
    }
}
