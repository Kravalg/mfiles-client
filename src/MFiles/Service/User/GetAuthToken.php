<?php

namespace MFiles\Service\User;

use MFiles\Service\Exception\InvalidJsonException;
use MFiles\Service\MFilesPostService;
use MFiles\Service\MFilesRequestInterface;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\User\Request\GetAuthTokenRequest;
use MFiles\Service\User\Response\GetAuthTokenResponse;

class GetAuthToken extends MFilesPostService
{
    const URI = 'server/authenticationtokens';

    /**
     * Return the service URI.
     *
     * @param null $request
     *
     * @return string
     */
    public function getUri($request = null): string
    {
        return self::URI;
    }

    /**
     * Transform an Request to POST options.
     *
     * @param MFilesRequestInterface $request
     *
     * @return array
     */
    public function getRequestOptions(MFilesRequestInterface $request): array
    {
        /* @var GetAuthTokenRequest $request */
        return [
            'json' => [
                'Username'  => $request->getUsername(),
                'Password'  => $request->getPassword(),
                'VaultGuid' => $request->getVaultGuid(),
            ],
        ];
    }

    /**
     * Transform an Json response to a Response object.
     *
     * @param $response
     *
     * @throws InvalidJsonException
     *
     * @return MFilesResponseInterface
     */
    protected function parseResponse($response): MFilesResponseInterface
    {
        if ($this->isValidResponse($response)) {
            $authTokenResponse = new GetAuthTokenResponse();
            $authTokenResponse->setValue($response->Value);

            return $authTokenResponse;
        } else {
            throw new InvalidJsonException();
        }
    }

    /**
     * Verifies the correctness of the API response.
     *
     * @param \stdClass $response
     *
     * @return bool
     */
    protected function isValidResponse($response)
    {
        if (isset($response->Value) && ! empty($response->Value)) {
            return true;
        }

        return false;
    }
}
