<?php

namespace Context;

use MFiles\Service\File\Response\DownloadFileResponse;
use MFiles\Service\MFilesResponseInterface;
use PHPUnit_Framework_Assert;

class DownloadFileContext extends BaseContext
{
    /**
     * @When /^I get file$/
     *
     * @throws \Exception
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    public function iGetFile()
    {
        // Build a MFilesCLient client
        $mfilesClient = $this->helper->getAuthorizedClient();

        /** @var MFilesResponseInterface $response */
        $response = $mfilesClient->downloadFile(
            $this->helper->getVariable('TESTS__MFILES_FILE_ID'),
            $this->helper->getVariable('TESTS__MFILES_FILE_OBJECT_TYPE'),
            $this->helper->getVariable('TESTS__MFILES_FILE_OBJECT_ID')
        );

        // Store the response
        $this->helper->setLastResponse($response);
    }

    /**
     * @Then /^it should return a valid Download File response$/
     *
     * @throws \Exception
     */
    public function itShouldReturnAValidDownloadFileResponse()
    {
        // Get last response, while asserting its class for debugging purposes.
        /** @var DownloadFileResponse $response */
        $response = $this->helper->getLastResponse(DownloadFileResponse::class);

        PHPUnit_Framework_Assert::assertNotNull($response->getFile());
    }
}
