<?php

namespace MFiles\Service\View\Item\Response;

use MFiles\Model\Folder\MFilesFolderDef;
use MFiles\Model\Folder\MFilesFolderUIState;
use MFiles\Model\View\MFilesViewItem;
use MFiles\Model\View\MFilesViewModeInfo;
use MFiles\Model\View\MFilesViewPathInfo;
use MFiles\Service\Response\BaseResponse;

/**
 * Class GetItemsFromViewResponse.
 */
class GetItemsFromViewResponse extends BaseResponse
{
    /** @var string */
    private $path;

    /** @var MFilesViewItem[] */
    private $items;

    /** @var string */
    private $viewSettingsId;

    /** @var bool|null */
    private $isGroupingEnabled = null;

    /** @var string */
    private $levelDefinition;

    /** @var int */
    private $totalCount;

    /** @var MFilesViewModeInfo */
    private $viewModeInfo;

    /** @var MFilesViewPathInfo[] */
    private $viewPathInfos;

    /** @var MFilesFolderUIState */
    private $folderUIState;

    /** @var MFilesFolderDef[] */
    private $folderDefs;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return MFilesViewItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getViewSettingsId(): string
    {
        return $this->viewSettingsId;
    }

    /**
     * @return bool|null
     */
    public function getIsGroupingEnabled()
    {
        return $this->isGroupingEnabled;
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
     * @return MFilesViewPathInfo[]
     */
    public function getViewPathInfos(): array
    {
        return $this->viewPathInfos;
    }

    /**
     * @return MFilesFolderDef[]
     */
    public function getFolderDefs()
    {
        return $this->folderDefs;
    }

    /**
     * @return MFilesFolderUIState
     */
    public function getFolderUIState(): MFilesFolderUIState
    {
        return $this->folderUIState;
    }

    /**
     * @param MFilesFolderDef[] $folderDefs
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
     * @param bool $isGroupingEnabled
     */
    public function setIsGroupingEnabled(bool $isGroupingEnabled)
    {
        $this->isGroupingEnabled = $isGroupingEnabled;
    }

    /**
     * @param MFilesViewItem[] $items
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
     * @param int $totalCount
     */
    public function setTotalCount(int $totalCount)
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param MFilesViewModeInfo $viewModeInfo
     */
    public function setViewModeInfo(MFilesViewModeInfo $viewModeInfo)
    {
        $this->viewModeInfo = $viewModeInfo;
    }

    /**
     * @param MFilesViewPathInfo[] $viewPathInfos
     */
    public function setViewPathInfos(array $viewPathInfos)
    {
        $this->viewPathInfos = $viewPathInfos;
    }

    /**
     * @param string $viewSettingsId
     */
    public function setViewSettingsId(string $viewSettingsId)
    {
        $this->viewSettingsId = $viewSettingsId;
    }
}
