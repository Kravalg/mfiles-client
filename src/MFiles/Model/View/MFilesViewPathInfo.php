<?php

namespace MFiles\Model\View;

class MFilesViewPathInfo
{
    /** @var string */
    private $viewId;

    /** @var string */
    private $viewName;

    /**
     * MFilesViewPathInfo constructor.
     *
     * @param string $viewId
     * @param string $viewName
     */
    public function __construct(string $viewId, string $viewName)
    {
        $this->viewId   = $viewId;
        $this->viewName = $viewName;
    }

    /**
     * @return string
     */
    public function getViewId(): string
    {
        return $this->viewId;
    }

    /**
     * @return string
     */
    public function getViewName(): string
    {
        return $this->viewName;
    }
}
