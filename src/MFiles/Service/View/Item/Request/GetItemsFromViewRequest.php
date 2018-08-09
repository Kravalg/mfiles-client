<?php

namespace MFiles\Service\View\Item\Request;

use MFiles\Service\MFilesRequestInterface;

class GetItemsFromViewRequest implements MFilesRequestInterface
{
    /** @var int */
    private $viewId;

    /**
     * GetItemsFromViewRequest constructor.
     *
     * @param int $viewId
     */
    public function __construct(int $viewId)
    {
        $this->viewId = $viewId;
    }

    /**
     * @return int
     */
    public function getViewId(): int
    {
        return $this->viewId;
    }
}
