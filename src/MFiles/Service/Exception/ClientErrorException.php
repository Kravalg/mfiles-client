<?php

namespace MFiles\Service\Exception;

use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;

class ClientErrorException extends MFilesException
{
    /** @var string */
    private $responseMessage;

    /** @var RequestInterface */
    private $request;

    /** @var ResponseInterface */
    private $httpResponse;

    /**
     * ClientErrorException constructor.
     *
     * @param string            $formattedErrorMessage
     * @param string            $responseMessage
     * @param RequestInterface  $request
     * @param ResponseInterface $httpResponse
     */
    public function __construct(
        string $formattedErrorMessage,
        string $responseMessage,
        RequestInterface $request = null,
        ResponseInterface $httpResponse = null
    ) {
        parent::__construct($formattedErrorMessage);
        $this->httpResponse    = $httpResponse;
        $this->request         = $request;
        $this->responseMessage = $responseMessage;
    }

    /**
     * @return ResponseInterface
     */
    public function getHttpResponse(): ResponseInterface
    {
        return $this->httpResponse;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->responseMessage;
    }
}
