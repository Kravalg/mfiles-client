<?php

namespace MFiles\Service\View;

use MFiles\Service\MFilesGetService;
use MFiles\Service\MFilesRequestInterface;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\View\Parser\FolderUIStateParser;
use MFiles\Service\View\Parser\ViewItemParser;
use MFiles\Service\View\Parser\ViewModeInfoParser;
use MFiles\Service\View\Response\GetViewItemsResponse;

class GetViewItems extends MFilesGetService
{
    const URI = 'views/items';

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
        return self::URI;
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
        return [
            'json' => [

            ],
        ];
    }

    /**
     * Transform an JSON response to a Response object.
     *
     * @param $response
     *
     * @return MFilesResponseInterface
     */
    protected function parseResponse($response): MFilesResponseInterface
    {
        $items         = $this->parseItems($response->Items);
        $viewMode      = (new ViewModeInfoParser())->parse($response->ViewModeInfo);
        $folderUIState = (new FolderUIStateParser())->parse($response->FolderUIState);

        $getViewItemsResponse = new GetViewItemsResponse();

        $getViewItemsResponse->setPath($response->Path);
        $getViewItemsResponse->setViewSettingsID($response->ViewSettingsID);
        $getViewItemsResponse->setLevelDefinition($response->LevelDefinition);
        $getViewItemsResponse->setTotalCount($response->TotalCount);
        $getViewItemsResponse->setFolderDefs($response->FolderDefs);

        $getViewItemsResponse->setViewModeInfo($viewMode);
        $getViewItemsResponse->setItems($items);
        $getViewItemsResponse->setFolderUIState($folderUIState);

        return $getViewItemsResponse;
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
