<?php

namespace MFiles\Model\View;

class MFilesViewModeInfo
{
    /** @var int */
    private $viewMode;

    /** @var int */
    private $displayMode;

    /** @var int */
    private $metadataAtRightPane;

    /**
     * @return int
     */
    public function getDisplayMode(): int
    {
        return $this->displayMode;
    }

    /**
     * @return int
     */
    public function getMetadataAtRightPane(): int
    {
        return $this->metadataAtRightPane;
    }

    /**
     * @return int
     */
    public function getViewMode(): int
    {
        return $this->viewMode;
    }

    /**
     * @param int $displayMode
     */
    public function setDisplayMode(int $displayMode)
    {
        $this->displayMode = $displayMode;
    }

    /**
     * @param int $metadataAtRightPane
     */
    public function setMetadataAtRightPane(int $metadataAtRightPane)
    {
        $this->metadataAtRightPane = $metadataAtRightPane;
    }

    /**
     * @param int $viewMode
     */
    public function setViewMode(int $viewMode)
    {
        $this->viewMode = $viewMode;
    }
}
