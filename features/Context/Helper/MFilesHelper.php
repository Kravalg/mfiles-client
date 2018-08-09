<?php

namespace Context\Helper;

use Exception;
use MFiles\APIHandler;
use MFiles\MFilesClient;
use MFiles\Service\MFilesResponseInterface;
use Symfony\Component\Debug\Debug;

class MFilesHelper
{
    /** @var MFilesClient $client */
    private $client;

    /** @var APIHandler */
    private $apiHandler;

    /** @var MFilesResponseInterface */
    private $lastResponse;

    /**
     * MFilesHelper constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        Debug::enable();

        $this->apiHandler = new APIHandler(
            $this->getVariable('TESTS__MFILES_BASE_URI'),
            ['debug' => true]
        );
        $this->client = new MFilesClient($this->apiHandler);
    }

    /**
     * @param string $assertClassName
     *
     * @return MFilesResponseInterface
     */
    public function getLastResponse(string $assertClassName = null): MFilesResponseInterface
    {
        if ( ! $this->lastResponse) {
            throw new \LogicException('There are no last response!');
        }

        if ($assertClassName) {
            if ( ! is_a($this->lastResponse, $assertClassName)) {
                throw new \LogicException(sprintf('Last response should be a %s but is a %s!', $assertClassName, get_class($this->lastResponse)));
            }
        }

        return $this->lastResponse;
    }

    /**
     * @param string $key
     *
     * @throws Exception
     *
     * @return string
     */
    public function getVariable(string $key): string
    {
        $var = getenv($key);

        if ($var === false) {
            throw new Exception('You have to set an environment variable '.$key.'. See README.md');
        }

        return $var;
    }

    /**
     * @return MFilesClient
     */
    public function getClient(): MFilesClient
    {
        return $this->client;
    }

    /**
     * @throws Exception
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     *
     * @return MFilesClient
     */
    public function getAuthorizedClient(): MFilesClient
    {
        $this->getClient()
                 ->authorize(
                $this->getVariable('TESTS__MFILES_USERNAME'),
                $this->getVariable('TESTS__MFILES_PASSWORD'),
                $this->getVariable('TESTS__MFILES_VAULTGUID')
            );

        return $this->getClient();
    }

    /**
     * @param MFilesResponseInterface $lastResponse
     */
    public function setLastResponse(MFilesResponseInterface $lastResponse)
    {
        $this->lastResponse = $lastResponse;
    }

    public function setErrorResponse($lastResponse)
    {
        $this->lastResponse = $lastResponse;
    }

    public function getErrorResponse(object $assertClassName = null)
    {
        if ( ! $this->lastResponse) {
            throw new \LogicException('There are no last response!');
        }

        if ($assertClassName) {
            if ( ! is_a($this->lastResponse, $assertClassName)) {
                throw new \LogicException(sprintf('Last response should be a %s but is a %s!', $assertClassName, get_class($this->lastResponse)));
            }
        }

        return $this->lastResponse;
    }
}
