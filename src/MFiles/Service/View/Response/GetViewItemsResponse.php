<?php

namespace MFiles\Service\View\Response;

use MFiles\Model\Folder\MFilesFolderUIState;
use MFiles\Model\View\MFilesView;
use MFiles\Model\View\MFilesViewModeInfo;
use MFiles\Service\Response\BaseResponse;

class GetViewItemsResponse extends BaseResponse
{
    /** @var string */
    private $path;

    /** @var MFilesView[] */
    private $items;

    /** @var string */
    private $viewSettingsId;

    /** @var string */
    private $levelDefinition;

    /** @var int */
    private $totalCount;

    /** @var MFilesViewModeInfo */
    private $viewModeInfo;

    /** @var MFilesFolderUIState */
    private $folderUIState;

    /** @var array */
    private $folderDefs;

    /**
     * @return array
     */
    public function getFolderDefs(): array
    {
        return $this->folderDefs;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return MFilesView[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getLevelDefinition(): string
    {
        return $this->levelDefinition;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @return MFilesViewModeInfo
     */
    public function getViewModeInfo(): MFilesViewModeInfo
    {
        return $this->viewModeInfo;
    }

    /**
     * @return string
     */
    public function getViewSettingsId(): string
    {
        return $this->viewSettingsId;
    }

    /**
     * @return MFilesFolderUIState
     */
    public function getFolderUIState(): MFilesFolderUIState
    {
        return $this->folderUIState;
    }

    /**
     * @param array $folderDefs
     */
    public function setFolderDefs(array $folderDefs)
    {
        $this->folderDefs = $folderDefs;
    }

    /**
     * @param MFilesFolderUIState $folderUIState
     */
    public function setFolderUIState(MFilesFolderUIState $folderUIState)
    {
        $this->folderUIState = $folderUIState;
    }

    /**
     * @param MFilesView[] $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param string $levelDefinition
     */
    public function setLevelDefinition(string $levelDefinition)
    {
        $this->levelDefinition = $levelDefinition;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount(int $totalCount)
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @param MFilesViewModeInfo $viewModeInfo
     */
    public function setViewModeInfo(MFilesViewModeInfo $viewModeInfo)
    {
        $this->viewModeInfo = $viewModeInfo;
    }

    /**
     * @param string $viewSettingsId
     */
    public function setViewSettingsId(string $viewSettingsId)
    {
        $this->viewSettingsId = $viewSettingsId;
    }
}
