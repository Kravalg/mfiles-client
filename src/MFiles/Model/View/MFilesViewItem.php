<?php

namespace MFiles\Model\View;

use MFiles\Model\Folder\MFilesPropertyFolder;
use MFiles\Model\Folder\MFilesTraditionalFolder;
use MFiles\Model\Object\MFilesObject;

class MFilesViewItem
{
    /** @var int */
    private $folderContentItemType;

    /** @var MFilesView|null */
    private $view = null;

    /** @var MFilesTraditionalFolder|null */
    private $traditionalFolder = null;

    /** @var MFilesPropertyFolder|null */
    private $propertyFolder = null;

    /** @var MFilesObject|null */
    private $objectVersion = null;

    /**
     * @return int
     */
    public function getFolderContentItemType(): int
    {
        return $this->folderContentItemType;
    }

    /**
     * @return MFilesView|null
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return MFilesTraditionalFolder|null
     */
    public function getTraditionalFolder()
    {
        return $this->traditionalFolder;
    }

    /**
     * @return MFilesObject|null
     */
    public function getObjectVersion(): MFilesObject
    {
        return $this->objectVersion;
    }

    /**
     * @return MFilesPropertyFolder|null
     */
    public function getPropertyFolder(): MFilesPropertyFolder
    {
        return $this->propertyFolder;
    }

    /**
     * @param int $folderContentItemType
     */
    public function setFolderContentItemType(int $folderContentItemType)
    {
        $this->folderContentItemType = $folderContentItemType;
    }

    /**
     * @param MFilesView $view
     */
    public function setView(MFilesView $view)
    {
        $this->view = $view;
    }

    /**
     * @param MFilesTraditionalFolder $traditionalFolder
     */
    public function setTraditionalFolder(MFilesTraditionalFolder $traditionalFolder)
    {
        $this->traditionalFolder = $traditionalFolder;
    }

    /**
     * @param MFilesObject|null $objectVersion
     */
    public function setObjectVersion(MFilesObject $objectVersion)
    {
        $this->objectVersion = $objectVersion;
    }

    /**
     * @param MFilesPropertyFolder|null $propertyFolder
     */
    public function setPropertyFolder(MFilesPropertyFolder $propertyFolder)
    {
        $this->propertyFolder = $propertyFolder;
    }
}
