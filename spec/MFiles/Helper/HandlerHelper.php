<?php

namespace spec\MFiles\Helper;

use MFiles\APIHandler;
use MFiles\Service\User\GetAuthToken;
use MFiles\Service\User\Request\GetAuthTokenRequest;
use MFiles\Service\User\Response\GetAuthTokenResponse;

class HandlerHelper
{
    /**
     * @param APIHandler $apiHandler
     *
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     *
     * @return APIHandler
     */
    public static function getAuthorized(APIHandler $apiHandler)
    {
        $service = new GetAuthToken($apiHandler);

        /** @var GetAuthTokenResponse $response */
        $response = $service->call(new GetAuthTokenRequest(
            getenv('TESTS__MFILES_USERNAME'),
            getenv('TESTS__MFILES_PASSWORD'),
            getenv('TESTS__MFILES_VAULTGUID')
        ));

        $authToken = $response->getValue();

        $apiHandler->setAuthToken($authToken);

        return $apiHandler;
    }
}
