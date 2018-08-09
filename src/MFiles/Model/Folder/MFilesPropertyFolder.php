<?php

namespace MFiles\Model\Folder;

use MFiles\Model\MFilesLookup;

/**
 * Class MFilesPropertyFolder.
 */
class MFilesPropertyFolder
{
    /** @var MFilesLookup|null */
    private $lookup = null;

    /** @var bool */
    private $hasValue;

    /** @var string */
    private $displayValue;

    /** @var string */
    private $serializedValue;

    /** @var int */
    private $dataType;

    /** @var string */
    private $sortingKey;

    /** @var bool */
    private $hasAutomaticPermission;

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
    public function getDataType(): int
    {
        return $this->dataType;
    }

    /**
     * @return MFilesLookup|null
     */
    public function getLookup()
    {
        return $this->lookup;
    }

    /**
     * @return string
     */
    public function getSerializedValue(): string
    {
        return $this->serializedValue;
    }

    /**
     * @return string
     */
    public function getSortingKey(): string
    {
        return $this->sortingKey;
    }

    /**
     * @return bool
     */
    public function getHasValue(): bool
    {
        return $this->hasValue;
    }

    /**
     * @return bool
     */
    public function getHasAutomaticPermission(): bool
    {
        return $this->hasAutomaticPermission;
    }

    /**
     * @param string $displayValue
     */
    public function setDisplayValue(string $displayValue)
    {
        $this->displayValue = $displayValue;
    }

    /**
     * @param int $dataType
     */
    public function setDataType(int $dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @param bool $hasAutomaticPermission
     */
    public function setHasAutomaticPermission(bool $hasAutomaticPermission)
    {
        $this->hasAutomaticPermission = $hasAutomaticPermission;
    }

    /**
     * @param bool $hasValue
     */
    public function setHasValue(bool $hasValue)
    {
        $this->hasValue = $hasValue;
    }

    /**
     * @param MFilesLookup $lookup
     */
    public function setLookup(MFilesLookup $lookup)
    {
        $this->lookup = $lookup;
    }

    /**
     * @param string $serializedValue
     */
    public function setSerializedValue(string $serializedValue)
    {
        $this->serializedValue = $serializedValue;
    }

    /**
     * @param string $sortingKey
     */
    public function setSortingKey(string $sortingKey)
    {
        $this->sortingKey = $sortingKey;
    }
}
