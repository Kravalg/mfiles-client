<?php

namespace Context;

use MFiles\Service\User\Response\GetAuthTokenResponse;
use PHPUnit_Framework_Assert;

class GetAuthTokenContext extends BaseContext
{
    /**
     * @When /^I get an auth token$/
     *
     * @throws \Exception
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    public function iGetAnAuthToken()
    {
        // Build a MFilesCLient client
        $mfilesClient = $this->helper->getClient();

        // Actual call
        $response = $mfilesClient->authorize(
            $this->helper->getVariable('TESTS__MFILES_USERNAME'),
            $this->helper->getVariable('TESTS__MFILES_PASSWORD'),
            $this->helper->getVariable('TESTS__MFILES_VAULTGUID')
        );

        // Store the response
        $this->helper->setLastResponse($response);
    }

    /**
     * @Then /^it should return a valid Get Auth Token response$/
     *
     * @throws \Exception
     */
    public function itShouldReturnAValidGetAuthTokenResponse()
    {
        // Get last response, while asserting its class for debugging purposes.
        /** @var GetAuthTokenResponse $response */
        $response = $this->helper->getLastResponse(GetAuthTokenResponse::class);

        PHPUnit_Framework_Assert::assertNotNull($response->getValue());
    }
}
