<?php

namespace MFiles\Service;

use MFiles\APIHandler;
use MFiles\Service\Exception\InvalidJsonException;

abstract class MFilesBaseService implements MFilesServiceInterface
{
    /** @var APIHandler */
    private $apiHandler;

    /**
     * GetDocument constructor.
     *
     * @param APIHandler $apiHandler
     */
    public function __construct(APIHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    /**
     * @return APIHandler
     */
    public function getClient(): APIHandler
    {
        return $this->apiHandler;
    }

    /**
     * Return the service URI.
     * Follow the rules from RFC 3986 http://tools.ietf.org/html/rfc3986#section-5.2.
     *
     * @param null $request
     *
     * @return string
     */
    abstract protected function getUri($request = null): string;

    /**
     * Transform an Request to POST parameters.
     *
     * @param MFilesRequestInterface $request
     *
     * @return array
     */
    abstract protected function getRequestOptions(MFilesRequestInterface $request): array;

    /**
     * Transform an JSON response to a Response object.
     *
     * @param $json
     *
     * @return MFilesResponseInterface
     */
    abstract protected function parseResponse($json): MFilesResponseInterface;

    /**
     * @param array  $params
     * @param string $uri
     *
     * @return string
     */
    protected function generateDynamicUriFromParams(array $params, string $uri) : string
    {
        foreach ($params as $paramName => $paramValue) {
            $uri = str_replace("{{{$paramName}}}", $paramValue, $uri);
        }

        return $uri;
    }

    /**
     * @param string $body
     *
     * @throws InvalidJsonException
     *
     * @return \stdClass
     */
    protected function decodeResponse(string $body) : \stdClass
    {
        $decodedData = json_decode($body);

        if (empty($decodedData)) {
            throw new InvalidJsonException();
        }

        return $decodedData;
    }
}
