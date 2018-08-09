<?php

namespace MFiles\Model\Folder;

class MFilesFolderDef
{
    /** @var int */
    private $folderDefType;

    /** @var int */
    private $view;

    /**
     * MFilesFolderDefs constructor.
     *
     * @param int $folderDefType
     * @param int $view
     */
    public function __construct(int $folderDefType, int $view)
    {
        $this->folderDefType = $folderDefType;
        $this->view          = $view;
    }

    /**
     * @return int
     */
    public function getFolderDefType(): int
    {
        return $this->folderDefType;
    }

    /**
     * @return int
     */
    public function getView(): int
    {
        return $this->view;
    }
}
