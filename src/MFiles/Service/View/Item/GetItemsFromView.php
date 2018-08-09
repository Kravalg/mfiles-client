<?php

namespace MFiles\Service\View\Item;

use MFiles\Model\Folder\MFilesFolderDef;
use MFiles\Model\View\MFilesViewPathInfo;
use MFiles\Service\MFilesGetService;
use MFiles\Service\MFilesRequestInterface;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\View\Item\Request\GetItemsFromViewRequest;
use MFiles\Service\View\Item\Response\GetItemsFromViewResponse;
use MFiles\Service\View\Parser\FolderUIStateParser;
use MFiles\Service\View\Parser\ViewItemParser;
use MFiles\Service\View\Parser\ViewModeInfoParser;

class GetItemsFromView extends MFilesGetService
{
    const URI = 'views/v{{ViewID}}/items';

    /**
     * Return the service URI.
     * Follow the rules from RFC 3986 http://tools.ietf.org/html/rfc3986#section-5.2.
     *
     * @param MFilesRequestInterface|null $request
     *
     * @return string
     */
    public function getUri($request = null): string
    {
        /** @var GetItemsFromViewRequest $request */
        $uri = $this->generateDynamicUriFromParams([
            'ViewID' => $request->getViewId(),
        ], self::URI);

        return $uri;
    }

    /**
     * Transform an Request to POST parameters.
     *
     * @param MFilesRequestInterface $request
     *
     * @return array
     */
    public function getRequestOptions(MFilesRequestInterface $request): array
    {
        return [];
    }

    /**
     * Transform an JSON response to a Response object.
     *
     * @param $response
     *
     * @return MFilesResponseInterface
     */
    public function parseResponse($response): MFilesResponseInterface
    {
        //TODO: implement error handling 404, empty items and etc

        $getItemsFromViewResponse = new GetItemsFromViewResponse();

        $viewModeInfo = (new ViewModeInfoParser())
            ->parse($response->ViewModeInfo);

        $folderUIState = (new FolderUIStateParser())
            ->parse($response->FolderUIState);

        $viewPathInfos = $this->parseViewPathInfos(
            $response->viewPathInfos);

        $folderDefs = $this->parseFolderDefs(
            $response->FolderDefs);

        $items = $this->parseItems(
            $response->Items);

        $getItemsFromViewResponse->setPath($response->Path);
        $getItemsFromViewResponse->setViewSettingsID($response->ViewSettingsID);
        $getItemsFromViewResponse->setLevelDefinition($response->LevelDefinition);
        $getItemsFromViewResponse->setTotalCount($response->TotalCount);

        $getItemsFromViewResponse->setViewModeInfo($viewModeInfo);
        $getItemsFromViewResponse->setFolderUIState($folderUIState);
        $getItemsFromViewResponse->setViewPathInfos($viewPathInfos);
        $getItemsFromViewResponse->setFolderDefs($folderDefs);
        $getItemsFromViewResponse->setItems($items);

        if (isset($response->IsGroupingEnabled)) {
            $getItemsFromViewResponse->setIsGroupingEnabled($response->IsGroupingEnabled);
        }

        return $getItemsFromViewResponse;
    }

    /**
     * @param array $viewPathInfos
     *
     * @return MFilesViewPathInfo[]
     */
    protected function parseViewPathInfos(array $viewPathInfos)
    {
        $newViewPathInfos = [];

        foreach ($viewPathInfos as $viewPathInfo) {
            array_push(
                $newViewPathInfos,
                $this->parseViewPathInfo($viewPathInfo)
            );
        }

        return $newViewPathInfos;
    }

    /**
     * @param \stdClass $viewPathInfo
     *
     * @return MFilesViewPathInfo
     */
    protected function parseViewPathInfo(\stdClass $viewPathInfo)
    {
        return new MFilesViewPathInfo(
            $viewPathInfo->ViewID,
            $viewPathInfo->ViewName
        );
    }

    /**
     * @param array $folderDefs
     *
     * @return MFilesFolderDef[]
     */
    protected function parseFolderDefs(array $folderDefs)
    {
        $newFolderDefs = [];

        foreach ($folderDefs as $folderDef) {
            array_push(
                $newFolderDefs,
                $this->parseFolderDef($folderDef)
            );
        }

        return $newFolderDefs;
    }

    /**
     * @param \stdClass $folderDef
     *
     * @return MFilesFolderDef
     */
    protected function parseFolderDef(\stdClass $folderDef)
    {
        return new MFilesFolderDef(
            $folderDef->FolderDefType,
            $folderDef->View
        );
    }

    /**
     * Parse JSON to object items.
     *
     * @param array $items
     *
     * @return array
     */
    protected function parseItems(array $items)
    {
        $objects = [];

        foreach ($items as $item) {
            array_push(
                $objects,
                (new ViewItemParser())->parse($item)
            );
        }

        return $objects;
    }
}
