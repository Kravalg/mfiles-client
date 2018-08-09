<?php

namespace MFiles\Model\View;

class MFilesView
{
    /** @var int */
    private $id;

    /** @var bool */
    private $common;

    /** @var int */
    private $parent;

    /** @var int */
    private $depth;

    /** @var string */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

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
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @return int
     */
    public function getParent(): int
    {
        return $this->parent;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param bool $common
     */
    public function setCommon(bool $common)
    {
        $this->common = $common;
    }

    /**
     * @param int $depth
     */
    public function setDepth(int $depth)
    {
        $this->depth = $depth;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent)
    {
        $this->parent = $parent;
    }
}
