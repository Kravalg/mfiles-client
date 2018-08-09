<?php

namespace MFiles;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use MFiles\Service\Exception\AccessDeniedException;
use MFiles\Service\Exception\ApiException;
use MFiles\Service\Exception\ClientErrorException;
use MFiles\Service\Exception\InvalidJsonException;
use MFiles\Service\Exception\NotFoundException;
use MFiles\Service\Exception\ServiceException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class APIHandler
{
    /** @var ClientInterface */
    private $http;

    /** @var LoggerInterface */
    private $logger;

    /** @var array */
    private $guzzleOptions = [];

    /** @var string */
    private $authToken = null;

    /**
     * MFilesAPIClient constructor.
     *
     * @param string $baseUrl
     * @param array  $guzzleOptions
     */
    public function __construct(
        string $baseUrl,
        array $guzzleOptions = []
    ) {
        $this->guzzleOptions = array_merge([
            'exceptions' => false,
            'base_url'   => $baseUrl, // Guzzle 5
            //'base_uri'   => self::API_BASE_PATH, // Guzzle 6
        ], $guzzleOptions);
    }

    /**
     * @param string $authToken
     */
    public function setAuthToken(string $authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @param $uri
     * @param array $options
     *
     * @throws AccessDeniedException
     * @throws ClientErrorException
     * @throws NotFoundException
     * @throws ServiceException
     *
     * @return string
     */
    public function post($uri, array $options = [])
    {
        $httpRequest = $this->getHttpClient()->createRequest('POST', $uri, $options);

        $this->setAuthHeaderToRequest($httpRequest);

        $body = $this->sendRequest($httpRequest);

        return $body;
    }

    /**
     * @param $uri
     * @param array $options
     *
     * @throws AccessDeniedException
     * @throws ClientErrorException
     * @throws NotFoundException
     * @throws ServiceException
     *
     * @return string
     */
    public function get($uri, array $options = [])
    {
        $httpRequest = $this->getHttpClient()->createRequest('GET', $uri, $options);

        $this->setAuthHeaderToRequest($httpRequest);

        $body = $this->sendRequest($httpRequest);

        return $body;
    }

    /**
     * @param RequestInterface $httpRequest
     */
    private function setAuthHeaderToRequest(RequestInterface $httpRequest)
    {
        if ( ! empty($this->authToken)) {
            $httpRequest->setHeader('X-Authentication', $this->authToken);
        }
    }

    /**
     * @param $httpRequest
     *
     * @throws AccessDeniedException
     * @throws ClientErrorException
     * @throws NotFoundException
     * @throws ServiceException
     *
     * @return null|string
     */
    private function sendRequest(RequestInterface $httpRequest)
    {
        $body = null;
        try {
            $response = $this->getHttpClient()->send($httpRequest);
        } catch (ApiException $e) {
            $this->throwApiExeption($e->getResponse(), $httpRequest);
        }

        $this->processResponse($response, $httpRequest); // logic Exception

        // all ok
        return $response->getBody()->getContents();
    }

    private function processResponse(\GuzzleHttp\Message\ResponseInterface $response, RequestInterface $httpRequest)
    {
        $code = $response->getStatusCode();

        if ($code < 200 || $code >= 300) {
            $this->throwApiExeption($response, $httpRequest);
        }
    }

    private function throwApiExeption(\GuzzleHttp\Message\ResponseInterface $response, RequestInterface $httpRequest)
    {
        $data    = json_decode($response->getBody()->getContents(), true);
        $message = $data['Exception']['Name'].' '.$data['Exception']['Message'];

        throw new ApiException(
            $message,
            $response->getStatusCode(),
            $httpRequest->getUrl(),
            $httpRequest->getMethod()
        );
    }

    /**
     * Set the Http Client object.
     *
     * @param ClientInterface $http
     */
    public function setHttpClient(ClientInterface $http)
    {
        $this->http = $http;
    }

    /**
     * @return ClientInterface implementation
     */
    public function getHttpClient()
    {
        if (is_null($this->http)) {
            $this->http = $this->createDefaultHttpClient();
        }

        return $this->http;
    }

    /**
     * @param array $options
     *
     * @return GuzzleClient
     */
    public function createDefaultHttpClient(array $options = [])
    {
        return new GuzzleClient(array_merge($this->guzzleOptions, $options));
    }

    /**
     * @throws \Exception
     *
     * @return Logger|LoggerInterface
     */
    public function getLogger()
    {
        if ( ! isset($this->logger)) {
            $this->logger = $this->createDefaultLogger();
        }

        return $this->logger;
    }

    /**
     * @throws \Exception
     *
     * @return Logger
     */
    private function createDefaultLogger()
    {
        $logger  = new Logger('mfiles-api-php-client');
        $handler = new StreamHandler('php://stderr', Logger::NOTICE);
        $logger->pushHandler($handler);

        return $logger;
    }

    /**
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return $this->guzzleOptions;
    }

    protected function decodeResponse(string $body): \stdClass
    {
        $decodedData = json_decode($body);

        if (empty($decodedData)) {
            throw new InvalidJsonException();
        }

        return $decodedData;
    }

    /**
     * @param string            $body
     * @param ResponseInterface $httpResponse
     * @param RequestInterface  $httpRequest
     *
     * @throws \MFiles\ErrorHandler
     * @throws AccessDeniedException
     * @throws ClientErrorException
     * @throws NotFoundException
     */
    protected function handleError(
        string $body,
        ResponseInterface $httpResponse

    ) {
        $statusCode = $httpResponse->getStatusCode();

        // 2xx: Success
        if ($statusCode >= 200 && $statusCode < 300) {
            return;
        } else {
            return new ErrorHandler($body);
        }
    }
}
