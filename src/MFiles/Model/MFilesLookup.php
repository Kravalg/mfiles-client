<?php

namespace MFiles\Model;

/**
 * Class MFilesLookup.
 */
class MFilesLookup
{
    /** @var int */
    private $item;

    /** @var int */
    private $version;

    /** @var string */
    private $displayValue;

    /**
     * @return string
     */
    public function getDisplayValue(): string
    {
        return $this->displayValue;
    }

    /**
     * @return int
     */
    public function getItem(): int
    {
        return $this->item;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param string $displayValue
     */
    public function setDisplayValue(string $displayValue)
    {
        $this->displayValue = $displayValue;
    }

    /**
     * @param int $item
     */
    public function setItem(int $item)
    {
        $this->item = $item;
    }

    /**
     * @param int $version
     */
    public function setVersion(int $version)
    {
        $this->version = $version;
    }
}
