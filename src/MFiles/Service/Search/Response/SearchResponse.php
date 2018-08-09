<?php

namespace MFiles\Service\Search\Response;

use MFiles\Model\Search\MFilesSearch;
use MFiles\Service\Response\BaseResponse;

class SearchResponse extends BaseResponse
{
    /** @var MFilesSearch[] */
    private $objects;
    /** @var bool */
    private $moreResults;
    /**
     * @return MFilesSearch[]
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

    /**
     * @param MFilesSearch[] $objects
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
