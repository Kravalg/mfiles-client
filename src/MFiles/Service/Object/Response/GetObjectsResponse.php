<?php

namespace MFiles\Service\Object\Response;

use MFiles\Model\Object\MFilesObject;
use MFiles\Service\Response\BaseResponse;

class GetObjectsResponse extends BaseResponse
{
    /** @var MFilesObject[] */
    private $objects;
    /** @var bool */
    private $moreResults;
    /**
     * @return MFilesObject[]
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

    /**
     * @param MFilesObject[] $objects
     */
    public function setObjects(array $objects)
    {
        $this->objects = $objects;
    }

    /**
     * @param bool $moreResults
     */
    public function setMoreResults(bool $moreResults)
    {
        $this->moreResults = $moreResults;
    }

    /**
     * @return bool
     */
    public function getMoreResults()
    {
        return $this->moreResults;
    }
}
