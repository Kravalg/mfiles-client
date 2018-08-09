<?php

namespace MFiles\Model\Folder;

class MFilesFolderListingUIState
{
    /** @var MFilesFolderListingColumn[] */
    private $columns;

    /** @var MFilesFolderListingColumnSorting[] */
    private $columnSortings;

    /**
     * @return MFilesFolderListingColumn[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return MFilesFolderListingColumnSorting[]
     */
    public function getColumnSortings(): array
    {
        return $this->columnSortings;
    }

    /**
     * @param MFilesFolderListingColumn[] $columns
     */
    public function setColumns(array $columns)
    {
        $this->columns = $columns;
    }

    /**
     * @param MFilesFolderListingColumnSorting[] $columnSortings
     */
    public function setColumnSortings(array $columnSortings)
    {
        $this->columnSortings = $columnSortings;
    }
}
