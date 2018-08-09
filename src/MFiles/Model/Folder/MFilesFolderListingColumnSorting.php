<?php

namespace MFiles\Model\Folder;

class MFilesFolderListingColumnSorting
{
    /** @var int */
    private $id;

    /** @var int */
    private $index;

    /** @var bool */
    private $sortAscending;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @return bool
     */
    public function getSortAscending(): bool
    {
        return $this->sortAscending;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index)
    {
        $this->index = $index;
    }

    /**
     * @param bool $sortAscending
     */
    public function setSortAscending(bool $sortAscending)
    {
        $this->sortAscending = $sortAscending;
    }
}
