<?php

namespace Context;

use MFiles\Model\Search\MFilesFile;
use MFiles\Model\Search\MFilesObjectVersion;
use MFiles\Model\Search\MFilesSearch;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\Search\Response\SearchResponse;
use PHPUnit_Framework_Assert;

class SearchResultContext extends BaseContext
{
    /**
     * @When /^I get search result$/
     *
     * @throws \Exception
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    public function iGetSearchResult()
    {
        // Build a MFilesCLient client
        $mfilesClient = $this->helper->getAuthorizedClient();

        /** @var MFilesResponseInterface $response */
        $response = $mfilesClient->searchResult(['q' => 'off']);
        // Store the response
        $this->helper->setLastResponse($response);
    }

    /**
     * @Then /^it should return a valid Search Result response$/
     *
     * @throws \Exception
     */
    public function itShouldReturnAValidSearchResultResponse()
    {
        // Get last response, while asserting its class for debugging purposes.
        /** @var SearchResponse $response */
        $response = $this->helper->getLastResponse(SearchResponse::class);
        PHPUnit_Framework_Assert::assertNotNull($response->getObjects());
        PHPUnit_Framework_Assert::assertNotNull($response->getMoreResults());
    }

    /**
     * @Then /^it should exist a valid Search object$/
     *
     * @throws \Exception
     */
    public function itShouldExistAValidSearchObject()
    {
        // Get last response, while asserting its class for debugging purposes.
        /** @var SearchResponse $response */
        $response = $this->helper->getLastResponse(SearchResponse::class);
        /** @var MFilesSearch $object */
        $object = $this->getMFilesObjectIfExist($response->getObjects());

        if ( ! empty($object)) {
            PHPUnit_Framework_Assert::assertContainsOnly(
                'string',
                [$object->getTitle()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'string',
                [$object->getEscapedTitleWithId()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'string',
                [$object->getObjectGUID()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'string',
                [$object->getObjectVersionFlags()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'string',
                [$object->getPathInIdView()]
            );

            PHPUnit_Framework_Assert::assertContainsOnly(
                'integer',
                [$object->getCheckedOutTo()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'integer',
                [$object->getClass()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'integer',
                [$object->getDisplayId()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'integer',
                [$object->getScore()]
            );

            PHPUnit_Framework_Assert::assertContainsOnly(
                'bool',
                [$object->getSingleFile()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                'bool',
                [$object->getObjectCheckedOutToThisUser()]
            );

            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getAccessedByMe()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getAccessedByMeUTC()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getCheckedOutAt()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getCheckedOutAtDisplayValue()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getCheckedOutAtUTC()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getLastAccessedByMe()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getCreated()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getCreatedDisplayValue()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getLastModifiedUTC()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getCreatedUTC()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly(
                \DateTime::class,
                [$object->getLastModifiedDisplayValue()]
            );
        }
    }

    /**
     * @Then /^it should exist a valid search version object$/
     *
     * @throws \Exception
     */
    public function itShouldExistAValidSearchVersionObject()
    {
        // Get last response, while asserting its class for debugging purposes.
        /** @var SearchResponse $response */
        $response = $this->helper->getLastResponse(SearchResponse::class);

        /** @var MFilesSearch $object */
        $object = $this->getMFilesObjectIfExist($response->getObjects());

        if ( ! empty($object)) {
            PHPUnit_Framework_Assert::assertContainsOnly(
                MFilesObjectVersion::class,
                [$object->getObjVer()]
            );
        }
    }

    /**
     * @Then /^it should exist a valid search objects object$/
     *
     * @throws \Exception
     */
    public function itShouldExistAValidSearchObjectsObject()
    {
        // Get last response, while asserting its class for debugging purposes.
        /** @var SearchResponse $response */
        $response = $this->helper->getLastResponse(SearchResponse::class);

        /** @var MFilesSearch $object */
        $object = $this->getMFilesObjectIfExist($response->getObjects());

        if ( ! empty($object)) {
            $files = $object->getFiles();

            PHPUnit_Framework_Assert::assertContainsOnly('array', [$files]);

            if (isset($files[0])) {
                /** @var MFilesFile $file */
                $file = $files[0];

                PHPUnit_Framework_Assert::assertContainsOnly('string', [$file->getName()]);
                PHPUnit_Framework_Assert::assertContainsOnly('string', [$file->getEscapedName()]);
                PHPUnit_Framework_Assert::assertContainsOnly('string', [$file->getEscapedName()]);
                PHPUnit_Framework_Assert::assertContainsOnly('string', [$file->getExtension()]);
                PHPUnit_Framework_Assert::assertContainsOnly('string', [$file->getFileGUID()]);

                PHPUnit_Framework_Assert::assertContainsOnly('integer', [$file->getId()]);
                PHPUnit_Framework_Assert::assertContainsOnly('integer', [$file->getSize()]);
                PHPUnit_Framework_Assert::assertContainsOnly('integer', [$file->getVersion()]);

                PHPUnit_Framework_Assert::assertContainsOnly(\DateTime::class, [$file->getLastModifiedDisplayValue()]);
                PHPUnit_Framework_Assert::assertContainsOnly(\DateTime::class, [$file->getLastModified()]);
                PHPUnit_Framework_Assert::assertContainsOnly(\DateTime::class, [$file->getCreatedUTC()]);
                PHPUnit_Framework_Assert::assertContainsOnly(\DateTime::class, [$file->getCreatedDisplayValue()]);
                PHPUnit_Framework_Assert::assertContainsOnly(\DateTime::class, [$file->getChangeTime()]);
                PHPUnit_Framework_Assert::assertContainsOnly(\DateTime::class, [$file->getChangeTimeUTC()]);
            }
        }
    }

    /**
     * @param array $objects
     *
     * @return MFilesSearch
     */
    private function getMFilesObjectIfExist(array $objects): MFilesSearch
    {
        if (isset($objects[0])) {
            return $objects[0];
        }

        return null;
    }
}
