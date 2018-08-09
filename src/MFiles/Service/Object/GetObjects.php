<?php

namespace MFiles\Service\Object;

use MFiles\Service\MFilesGetService;
use MFiles\Service\MFilesRequestInterface;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\Object\Parser\ObjectParser;
use MFiles\Service\Object\Response\GetObjectsResponse;

class GetObjects extends MFilesGetService
{
    const URI = 'objects';

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
        return self::URI;
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
        return [
            'json' => [

            ],
        ];
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
        $objects = $this->parseItems($response->Items);

        $getObjectsResponse = new GetObjectsResponse();
        $getObjectsResponse->setObjects($objects);
        $getObjectsResponse->setMoreResults($response->MoreResults);

        return $getObjectsResponse;
    }

    /**
     * Parse JSON to object items.
     *
     * @param array $items
     *
     * @return array
     */
    protected function parseItems(array $items)
    {
        $objects = [];

        foreach ($items as $item) {
            array_push(
                $objects,
                (new ObjectParser())->parse($item)
            );
        }

        return $objects;
    }
}
