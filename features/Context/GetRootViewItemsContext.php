<?php

namespace Context;

use MFiles\Model\Folder\MFilesFolderUIState;
use MFiles\Model\View\MFilesView;
use MFiles\Model\View\MFilesViewItem;
use MFiles\Model\View\MFilesViewModeInfo;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\View\Response\GetViewItemsResponse;
use PHPUnit_Framework_Assert;

class GetRootViewItemsContext extends BaseContext
{
    /**
     * @When /^I get view items$/
     *
     * @throws \Exception
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    public function iGetViewItems()
    {
        // Build a MFilesCLient client
        $mfilesClient = $this->helper->getAuthorizedClient();

        /** @var MFilesResponseInterface $response */
        $response = $mfilesClient->getRootViewItems();

        // Store the response
        $this->helper->setLastResponse($response);
    }

    /**
     * @Then /^it should return a valid Get View Items response$/
     *
     * @throws \Exception
     */
    public function itShouldReturnAValidGetViewItemsResponse()
    {
        // Get last response, while asserting its class for debugging purposes.

        /** @var GetViewItemsResponse $response */
        $response = $this->helper->getLastResponse(GetViewItemsResponse::class);

        PHPUnit_Framework_Assert::assertContainsOnly(
            \MFiles\Service\View\Response\GetViewItemsResponse::class,
            [$response]
        );
        PHPUnit_Framework_Assert::assertContainsOnly('string', [$response->getPath()]);
        PHPUnit_Framework_Assert::assertContainsOnly('array', [$response->getItems()]);
        PHPUnit_Framework_Assert::assertContainsOnly('string', [$response->getViewSettingsId()]);
        PHPUnit_Framework_Assert::assertContainsOnly('string', [$response->getLevelDefinition()]);
        PHPUnit_Framework_Assert::assertContainsOnly('integer', [$response->getTotalCount()]);
        PHPUnit_Framework_Assert::assertContainsOnly(
            \MFiles\Model\View\MFilesViewModeInfo::class,
            [$response->getViewModeInfo()]
        );
        PHPUnit_Framework_Assert::assertContainsOnly(
            \MFiles\Model\Folder\MFilesFolderUIState::class,
            [$response->getFolderUIState()]
        );
        PHPUnit_Framework_Assert::assertContainsOnly('array', [$response->getFolderDefs()]);
    }

    /**
     * @Then /^it should return a valid Get View Items Item response$/
     *
     * @throws \Exception
     **/
    public function itShouldReturnAValidGetViewItemsItemResponse()
    {

        /** @var MFilesViewItem $item */
        /** @var GetViewItemsResponse $response */
        $response = $this->helper->getLastResponse(GetViewItemsResponse::class);
        $item     = $response->getItems();
        if (isset($item[0])) {
            $item = $item[0];

            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getFolderContentItemType()]);
            if ($item->getView() != null) {
                PHPUnit_Framework_Assert::assertContainsOnly(
                    MFilesView::class,
                    [$item->getView()]
                );
            }
            if ($item->getTraditionalFolder() != null) {
                PHPUnit_Framework_Assert::assertContainsOnly(
                    'null',
                    [$item->getTraditionalFolder()]
                );
            }
        }
    }

    /**
     * @Then /^it should return a valid Get View Mode Info response$/
     *
     * @throws \Exception
     **/
    public function itShouldReturnAValidGetViewModeInfoResponse()
    {

        /** @var MFilesViewModeInfo $item */
        /** @var GetViewItemsResponse $response */
        $response = $this->helper->getLastResponse(GetViewItemsResponse::class);
        $item     = $response->getViewModeInfo();

        if (isset($item)) {
            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getViewMode()]);
            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getDisplayMode()]);
            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getMetadataAtRightPane()]);
        }
    }

    /**
     * @Then /^it should return a valid Get Folder UI State response$/
     *
     * @throws \Exception
     **/
    public function itShouldReturnAValidGetFolderUIStateResponse()
    {

        /** @var MFilesFolderUIState $item */
        /** @var GetViewItemsResponse $response */
        $response = $this->helper->getLastResponse(GetViewItemsResponse::class);
        $item     = $response->getFolderUIState();
        if (isset($item)) {
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getBottomPaneBarMinimized()]);
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getHitHighlightingEnabled()]);
            PHPUnit_Framework_Assert::assertContainsOnly(\MFiles\Model\Folder\MFilesFolderListingUIState::class,
                [$item->getListingUIState()]
            );
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getMetadataEditorInRightPane()]);
            PHPUnit_Framework_Assert::assertContainsOnly('int', [$item->getRelativeBottomPaneHeight()]);
            PHPUnit_Framework_Assert::assertContainsOnly('int', [$item->getRelativeRightPaneWidth()]);
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getRightPaneBarMinimized()]);
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getBottomPaneBarMinimized()]);
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getRightPaneBarMinimized()]);
        }
    }
}
