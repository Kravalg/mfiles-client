<?php

namespace MFiles\Service\View\Parser;

use MFiles\Model\Folder\MFilesFolderListingColumn;
use MFiles\Model\Folder\MFilesFolderListingColumnSorting;
use MFiles\Model\Folder\MFilesFolderListingUIState;
use MFiles\Model\Folder\MFilesFolderUIState;

class FolderUIStateParser
{
    /**
     * Parse FolderUIState JSON to MFilesFolderUIState object.
     *
     * @param \stdClass $item
     *
     * @return MFilesFolderUIState
     */
    public function parse(\stdClass $item) : MFilesFolderUIState
    {
        $object = new MFilesFolderUIState();

        $listingUIState = $this->parseListingUIState($item->ListingUIState);

        $object->setBottomPaneBarMinimized($item->BottomPaneBarMinimized);
        $object->setHitHighlightingEnabled($item->HitHighlightingEnabled);
        $object->setMetadataEditorInRightPane($item->MetadataEditorInRightPane);
        $object->setRelativeBottomPaneHeight($item->RelativeBottomPaneHeight);
        $object->setRelativeRightPaneWidth($item->RelativeRightPaneWidth);
        $object->setRightPaneBarMinimized($item->RightPaneBarMinimized);
        $object->setShowBottomPaneBar($item->ShowBottomPaneBar);
        $object->setShowRightPaneBar($item->ShowRightPaneBar);

        $object->setListingUIState($listingUIState);

        return $object;
    }

    /**
     * @param \stdClass $listingUIState
     *
     * @return MFilesFolderListingUIState
     */
    private function parseListingUIState(\stdClass $listingUIState) : MFilesFolderListingUIState
    {
        $newListingUIState = new MFilesFolderListingUIState();

        $columns        = $this->parseColumns($listingUIState->Columns);
        $columnSortings = $this->parseColumnSortings($listingUIState->ColumnSortings);

        $newListingUIState->setColumns($columns);

        $newListingUIState->setColumnSortings($columnSortings);

        return $newListingUIState;
    }

    /**
     * @param \stdClass[] $columns
     *
     * @return MFilesFolderListingColumn[]
     */
    private function parseColumns(array $columns) : array
    {
        $newColumns = [];

        foreach ($columns as $column) {
            array_push(
                $newColumns,
                $this->parseColumn($column)
            );
        }

        return $newColumns;
    }

    /**
     * @param \stdClass $column
     *
     * @return MFilesFolderListingColumn
     */
    private function parseColumn(\stdClass $column) : MFilesFolderListingColumn
    {
        $newColumn = new MFilesFolderListingColumn();

        $newColumn->setName($column->Name);
        $newColumn->setId($column->ID);
        $newColumn->setVisible($column->Visible);
        $newColumn->setWidth($column->Width);
        $newColumn->setFlags($column->Flags);
        $newColumn->setPosition($column->Position);

        return $newColumn;
    }

    /**
     * @param \stdClass[] $columnSortings
     *
     * @return MFilesFolderListingColumnSorting[]
     */
    private function parseColumnSortings(array $columnSortings) : array
    {
        $newColumnSortings = [];

        foreach ($columnSortings as $columnSorting) {
            array_push(
                $newColumnSortings,
                $this->parseColumnSorting($columnSorting)
            );
        }

        return $newColumnSortings;
    }

    /**
     * @param \stdClass $columnSorting
     *
     * @return MFilesFolderListingColumnSorting
     */
    private function parseColumnSorting(\stdClass $columnSorting) : MFilesFolderListingColumnSorting
    {
        $newColumnSorting = new MFilesFolderListingColumnSorting();

        $newColumnSorting->setId($columnSorting->ID);
        $newColumnSorting->setIndex($columnSorting->Index);
        $newColumnSorting->setSortAscending($columnSorting->SortAscending);

        return $newColumnSorting;
    }
}
