<?php

namespace MFiles\Service\View\Parser;

use MFiles\Model\View\MFilesViewModeInfo;

class ViewModeInfoParser
{
    /**
     * Parse ViewModeInfo JSON to view mode info object.
     *
     * @param \stdClass $viewModeInfo
     *
     * @return MFilesViewModeInfo
     */
    public function parse(\stdClass $viewModeInfo) : MFilesViewModeInfo
    {
        $newViewModeInfo = new MFilesViewModeInfo();

        $newViewModeInfo->setViewMode($viewModeInfo->ViewMode);
        $newViewModeInfo->setDisplayMode($viewModeInfo->DisplayMode);
        $newViewModeInfo->setMetadataAtRightPane($viewModeInfo->MetadataAtRightPane);

        return $newViewModeInfo;
    }
}
