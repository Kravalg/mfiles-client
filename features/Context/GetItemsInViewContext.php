<?php

namespace Context;

use MFiles\Model\Folder\MFilesFolderDef;
use MFiles\Model\Folder\MFilesFolderListingUIState;
use MFiles\Model\Folder\MFilesFolderUIState;
use MFiles\Model\Folder\MFilesTraditionalFolder;
use MFiles\Model\View\MFilesView;
use MFiles\Model\View\MFilesViewItem;
use MFiles\Model\View\MFilesViewModeInfo;
use MFiles\Model\View\MFilesViewPathInfo;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\View\Item\Response\GetItemsFromViewResponse;
use PHPUnit_Framework_Assert;

class GetItemsInViewContext extends BaseContext
{
    const MFILES_VIEW_ID = 2;

    /**
     * @When /^I get items from view$/
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
        $response = $mfilesClient->getItemsFromView(static::MFILES_VIEW_ID);

        // Store the response
        $this->helper->setLastResponse($response);
    }

    /**
     * @Then /^it should return a valid Get Items From View response$/
     *
     * @throws \Exception
     */
    public function itShouldReturnAValidGetItemsFromViewResponse()
    {
        // Get last response, while asserting its class for debugging purposes.

        /** @var GetItemsFromViewResponse $response */
        $response = $this->helper->getLastResponse(GetItemsFromViewResponse::class);

        PHPUnit_Framework_Assert::assertContainsOnly(
            GetItemsFromViewResponse::class,
            [$response]
        );
        PHPUnit_Framework_Assert::assertContainsOnly('string', [$response->getPath()]);
        PHPUnit_Framework_Assert::assertContainsOnly('array', [$response->getItems()]);
        PHPUnit_Framework_Assert::assertContainsOnly('string', [$response->getViewSettingsId()]);
        PHPUnit_Framework_Assert::assertContainsOnly('string', [$response->getLevelDefinition()]);
        PHPUnit_Framework_Assert::assertContainsOnly('integer', [$response->getTotalCount()]);
        PHPUnit_Framework_Assert::assertContainsOnly(
            MFilesViewModeInfo::class,
            [$response->getViewModeInfo()]
        );
        PHPUnit_Framework_Assert::assertContainsOnly(
            'array',
            [$response->getViewPathInfos()]
        );
        PHPUnit_Framework_Assert::assertContainsOnly(
            MFilesFolderUIState::class,
            [$response->getFolderUIState()]
        );
        PHPUnit_Framework_Assert::assertContainsOnly('array', [$response->getFolderDefs()]);
    }

    /**
     * @Then /^it should exist a valid items$/
     *
     * @throws \Exception
     **/
    public function itShouldExistAValidItems()
    {

        /** @var MFilesViewItem $item */
        /** @var GetItemsFromViewResponse $response */
        $response = $this->helper->getLastResponse(GetItemsFromViewResponse::class);
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
                    MFilesTraditionalFolder::class,
                    [$item->getTraditionalFolder()]
                );
            }
        }
    }

    /**
     * @Then /^it should exist a valid view mode info$/
     *
     * @throws \Exception
     **/
    public function itShouldExistAValidViewModeInfo()
    {

        /** @var MFilesViewModeInfo $item */
        /** @var GetItemsFromViewResponse $response */
        $response = $this->helper->getLastResponse(GetItemsFromViewResponse::class);
        $item     = $response->getViewModeInfo();

        if (isset($item)) {
            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getViewMode()]);
            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getDisplayMode()]);
            PHPUnit_Framework_Assert::assertContainsOnly('integer', [$item->getMetadataAtRightPane()]);
        }
    }

    /**
     * @Then /^it should exist a valid folder UI state$/
     *
     * @throws \Exception
     **/
    public function itShouldExistAValidFolderUIState()
    {

        /** @var MFilesFolderUIState $item */
        /** @var GetItemsFromViewResponse $response */
        $response = $this->helper->getLastResponse(GetItemsFromViewResponse::class);
        $item     = $response->getFolderUIState();
        if (isset($item)) {
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getBottomPaneBarMinimized()]);
            PHPUnit_Framework_Assert::assertContainsOnly('bool', [$item->getHitHighlightingEnabled()]);
            PHPUnit_Framework_Assert::assertContainsOnly(MFilesFolderListingUIState::class,
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

    /**
     * @Then /^it should exist a valid view path infos$/
     *
     * @throws \Exception
     **/
    public function itShouldExistAValidViewPathInfos()
    {

        /** @var MFilesViewItem $item */
        /** @var GetItemsFromViewResponse $response */
        $response = $this->helper->getLastResponse(GetItemsFromViewResponse::class);

        $item = $response->getViewPathInfos();

        if (isset($item[0])) {
            $item = $item[0];

            PHPUnit_Framework_Assert::assertContainsOnly(
                MFilesViewPathInfo::class,
                [$item]
            );

            PHPUnit_Framework_Assert::assertContainsOnly('string', [$item->getViewId()]);
            PHPUnit_Framework_Assert::assertContainsOnly('string', [$item->getViewName()]);
        }
    }

    /**
     * @Then /^it should exist a valid folder defs$/
     *
     * @throws \Exception
     **/
    public function itShouldExistAValidFolderDefs()
    {

        /** @var MFilesViewItem $item */
        /** @var GetItemsFromViewResponse $response */
        $response = $this->helper->getLastResponse(GetItemsFromViewResponse::class);

        $item = $response->getFolderDefs();

        if (isset($item[0])) {
            $item = $item[0];

            PHPUnit_Framework_Assert::assertContainsOnly(
                MFilesFolderDef::class,
                [$item]
            );

            PHPUnit_Framework_Assert::assertContainsOnly('int', [$item->getFolderDefType()]);
            PHPUnit_Framework_Assert::assertContainsOnly('int', [$item->getView()]);
        }
    }
}
